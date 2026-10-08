<?php

namespace SureCart\Controllers\Admin\Settings;

/**
 * Data for the client-side MCP settings tab (localized via the main Settings controller).
 *
 * The MCP Adapter is installed from WordPress.org through core's `/wp/v2/plugins` REST endpoint,
 * so it gets core updates and core's capability checks; there is no custom installer here.
 */
class MCPSettings {
	/**
	 * The MCP Adapter plugin file.
	 *
	 * @var string
	 */
	const MCP_ADAPTER_SLUG = 'mcp-adapter/mcp-adapter.php';

	/**
	 * The MCP Adapter listing on WordPress.org, for manual installs.
	 *
	 * @var string
	 */
	const MCP_ADAPTER_URL = 'https://wordpress.org/plugins/mcp-adapter/';

	/**
	 * Get the data required by the client-side MCP settings tab.
	 *
	 * Called from the main Settings controller to localize `scMCPData` on
	 * the shared settings script (the MCP tab no longer has its own entry).
	 *
	 * @return array
	 */
	public static function getLocalizedData() {
		if ( ! function_exists( 'get_plugins' ) ) {
			require_once ABSPATH . 'wp-admin/includes/plugin.php';
		}

		$all_plugins  = get_plugins();
		$is_installed = isset( $all_plugins[ self::MCP_ADAPTER_SLUG ] );
		$is_active    = is_plugin_active( self::MCP_ADAPTER_SLUG );

		return [
			'mcp_adapter_installed'   => $is_installed,
			'mcp_adapter_active'      => $is_active,
			'mcp_adapter_url'         => self::MCP_ADAPTER_URL,
			'site_url'                => site_url(),
			'rest_url'                => rest_url( 'mcp/mcp-adapter-default-server' ),
			'abilities_rest_url'      => rest_url( 'wp-abilities/v1' ),
			'app_passwords_url'       => admin_url( 'profile.php#application-passwords-section' ),
			'wp_version'              => get_bloginfo( 'version' ),
			'abilities_api_available' => function_exists( 'wp_register_ability_category' ),
			'current_username'        => wp_get_current_user()->user_login,
		];
	}
}
