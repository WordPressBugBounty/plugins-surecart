<?php

namespace SureCart\Middleware;

use Closure;
use SureCartCore\Requests\RequestInterface;
use SureCartCore\Responses\RedirectResponse;

/**
 * Middleware for handling model archiving.
 */
class SubscriptionRedirectMiddleware {
	/**
	 * Enqueue component assets.
	 *
	 * @param RequestInterface $request Request.
	 * @param Closure          $next Next.
	 * @return function
	 */
	public function handle( RequestInterface $request, Closure $next ) {
		$id = $request->query( 'subscription_id' );

		if ( $id ) {
			return ( new RedirectResponse( $request ) )->to(
				add_query_arg(
					[
						'action' => 'edit',
						'model'  => 'subscription',
						'id'     => $id,
					],
					\SureCart::pages()->url( 'dashboard' )
				)
			);
		}

		return $next( $request );
	}
}
