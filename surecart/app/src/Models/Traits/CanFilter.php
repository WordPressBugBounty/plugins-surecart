<?php

namespace SureCart\Models\Traits;

/**
 * Adds rule-based filtering against the resource's filter endpoints.
 *
 * These methods are protected but reachable from controllers/tests via Model::__call(),
 * the same convention as resend_notification()/finalize().
 */
trait CanFilter {
	/**
	 * Fetch the rule schema for the resource.
	 *
	 * Returns the raw rule_schema response object (attributes, types, operators).
	 *
	 * @return object|\WP_Error
	 */
	protected function filterSchema() {
		return $this->makeRequest( [ 'method' => 'GET' ], $this->endpoint . '/filter_schema' );
	}

	/**
	 * Fetch a paginated, filtered collection using a rule tree.
	 *
	 * @param array $rules      The rule tree (condition or group) to filter by.
	 * @param array $pagination Pagination args (page, per_page).
	 *
	 * @return \SureCart\Models\Collection|\WP_Error
	 */
	protected function filter( $rules = [], $pagination = [] ) {
		$this->setPagination( $pagination );

		$items = $this->makeRequest(
			[
				'method' => 'POST',
				'query'  => $this->query,
				'body'   => [ 'filter' => $rules ],
			],
			$this->endpoint . '/filter'
		);

		if ( $this->isError( $items ) ) {
			return $items;
		}

		if ( ! empty( $items->data ) ) {
			$models = [];
			foreach ( $this->expandFilterResults( $items->data ) as $data ) {
				$models[] = new static( $data );
			}
			$items->data = $models;
		}

		return new \SureCart\Models\Collection( $items );
	}

	/**
	 * Re-read the matched records from the index endpoint so ->with() is honored.
	 *
	 * The filter endpoint returns relations as bare ids and ignores expand, so a
	 * caller that asked for expansions would otherwise have to fetch each record
	 * individually. One extra request for the whole page replaces that N+1.
	 *
	 * @param array $data Raw records returned by the filter endpoint.
	 *
	 * @return array Records with expansions applied where the re-read succeeded.
	 */
	protected function expandFilterResults( $data ) {
		$expand = $this->query['expand'] ?? [];
		if ( empty( $expand ) ) {
			return $data;
		}

		$ids = array_values( array_filter( wp_list_pluck( $data, 'id' ) ) );
		if ( empty( $ids ) ) {
			return $data;
		}

		// Scoped only by the ids the filter call returned; request middleware is not reapplied here.
		$expanded = ( new static() )
			->where( [ 'ids' => $ids ] )
			->with( $expand )
			->setPagination(
				[
					'page'     => 1,
					'per_page' => count( $ids ),
				]
			)
			->makeRequest( [ 'method' => 'GET' ] );

		// Keep the filter results as-is rather than failing the whole call.
		if ( $this->isError( $expanded ) || empty( $expanded->data ) ) {
			return $data;
		}

		$by_id = [];
		foreach ( $expanded->data as $item ) {
			if ( ! empty( $item->id ) ) {
				$by_id[ $item->id ] = $item;
			}
		}

		return array_map(
			function ( $item ) use ( $by_id ) {
				return $by_id[ $item->id ?? '' ] ?? $item;
			},
			$data
		);
	}
}
