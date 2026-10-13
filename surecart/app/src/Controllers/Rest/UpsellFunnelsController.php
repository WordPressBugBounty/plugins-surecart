<?php

namespace SureCart\Controllers\Rest;

use SureCart\Concerns\RestrictsAnonymousReads;
use SureCart\Models\UpsellFunnel;

/**
 * Handle upsell requests through the REST API
 */
class UpsellFunnelsController extends RestController {
	use RestrictsAnonymousReads;

	/**
	 * Class to make the requests.
	 *
	 * @var string
	 */
	protected $class = UpsellFunnel::class;

	/**
	 * Capability that unlocks unrestricted reads.
	 *
	 * @var string
	 */
	protected $edit_capability = 'edit_sc_prices';

	/**
	 * Expands safe to forward for anonymous callers.
	 *
	 * None: upsells.price.product reaches the full private product graph,
	 * and the storefront never reads funnels over REST.
	 *
	 * @var array
	 */
	protected $anonymous_expands = [];

	/**
	 * Query filters forced for anonymous callers.
	 *
	 * @var array
	 */
	protected $anonymous_scope = [];
}
