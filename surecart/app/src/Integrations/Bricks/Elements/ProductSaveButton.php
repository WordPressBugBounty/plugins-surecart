<?php

namespace SureCart\Integrations\Bricks\Elements;

use SureCart\Integrations\Bricks\Concerns\ConvertsBlocks;

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

/**
 * Save for later (wishlist) button element.
 *
 * Bricks counterpart of the `surecart/product-save-button` block. Renders a native Bricks
 * button wired to the same `surecart/saved-items` store, so it works on the product page
 * and inside a product card (query loop).
 */
class ProductSaveButton extends \Bricks\Element {
	use ConvertsBlocks; // we have to use a trait since we can't extend the bricks class.

	/**
	 * Element category.
	 *
	 * @var string
	 */
	public $category = 'SureCart Elements';

	/**
	 * Element name.
	 *
	 * @var string
	 */
	public $name = 'surecart-product-save-button';

	/**
	 * Element icon.
	 *
	 * @var string
	 */
	public $icon = 'ti-heart';

	/**
	 * Get element label.
	 *
	 * @return string
	 */
	public function get_label() {
		return esc_html__( 'Save for Later Button', 'surecart' );
	}

	/**
	 * Get element keywords.
	 *
	 * @return array
	 */
	public function get_keywords() {
		return [ 'wishlist', 'save', 'favorite', 'heart', 'later' ];
	}

	/**
	 * Enqueue element-specific scripts.
	 *
	 * The saved-items script module reads these classic globals (wp.apiFetch, wp.url, wp.i18n).
	 */
	public function enqueue_scripts() {
		wp_enqueue_script( 'wp-api-fetch' );
		wp_enqueue_script( 'wp-url' );
		wp_enqueue_script( 'wp-i18n' );
	}

	/**
	 * Set controls.
	 *
	 * @return void
	 */
	public function set_controls() {
		$this->controls['display'] = [
			'tab'     => 'content',
			'label'   => esc_html__( 'Icon & Text', 'surecart' ),
			'type'    => 'select',
			'options' => [
				'both' => esc_html__( 'Both', 'surecart' ),
				'icon' => esc_html__( 'Icon', 'surecart' ),
				'text' => esc_html__( 'Text', 'surecart' ),
			],
			'default' => 'both',
			'inline'  => true,
		];

		// Placeholders, not defaults: Bricks saves a default into the element, freezing it in one language.
		// Left empty, the text is translated at render.
		$this->controls['content'] = [
			'tab'         => 'content',
			'label'       => esc_html__( 'Button Text', 'surecart' ),
			'type'        => 'text',
			'placeholder' => esc_html__( 'Save for later', 'surecart' ),
			'required'    => [ 'display', '!=', 'icon' ],
		];

		$this->controls['saved_text'] = [
			'tab'         => 'content',
			'label'       => esc_html__( 'Saved Text', 'surecart' ),
			'type'        => 'text',
			'placeholder' => esc_html__( 'Saved', 'surecart' ),
			'description' => esc_html__( 'Shown once the product is saved.', 'surecart' ),
			'required'    => [ 'display', '!=', 'icon' ],
		];

		// "Hide", not "Show": Bricks stores defaults only on new elements, so a default-on show
		// toggle would leave the link off in every template saved before it existed.
		$this->controls['hideChangeList'] = [
			'tab'         => 'content',
			'label'       => esc_html__( 'Hide "Change list" link', 'surecart' ),
			'type'        => 'checkbox',
			'description' => esc_html__( 'Signed-in customers see it once the product is saved: beside the button with Style set to None, under it otherwise.', 'surecart' ),
			'required'    => [ 'display', '!=', 'icon' ],
		];

		$this->controls['styleSeparator'] = [
			'label' => esc_html__( 'Style', 'surecart' ),
			'type'  => 'separator',
		];

		$this->controls['size'] = [
			'label'       => esc_html__( 'Size', 'surecart' ),
			'type'        => 'select',
			'options'     => $this->control_options['buttonSizes'],
			'inline'      => true,
			'reset'       => true,
			'placeholder' => esc_html__( 'Default', 'surecart' ),
		];

		$this->controls['style'] = [
			'label'       => esc_html__( 'Style', 'surecart' ),
			'type'        => 'select',
			'options'     => $this->control_options['styles'],
			'inline'      => true,
			'reset'       => true,
			'default'     => 'primary',
			'placeholder' => esc_html__( 'None', 'surecart' ),
		];

		$this->controls['circle'] = [
			'label' => esc_html__( 'Circle', 'surecart' ),
			'type'  => 'checkbox',
			'reset' => true,
		];

		$this->controls['outline'] = [
			'label' => esc_html__( 'Outline', 'surecart' ),
			'type'  => 'checkbox',
			'reset' => true,
		];

		$this->controls['iconSeparator'] = [
			'label'    => esc_html__( 'Icon', 'surecart' ),
			'type'     => 'separator',
			'required' => [ 'display', '!=', 'text' ],
		];

		$this->controls['icon'] = [
			'label'    => esc_html__( 'Icon', 'surecart' ),
			'type'     => 'icon',
			'default'  => [
				'library' => 'fontawesomeRegular',
				'icon'    => 'far fa-heart',
			],
			'required' => [ 'display', '!=', 'text' ],
		];

		$this->controls['saved_icon'] = [
			'label'    => esc_html__( 'Saved Icon', 'surecart' ),
			'type'     => 'icon',
			'default'  => [
				'library' => 'fontawesomeSolid',
				'icon'    => 'fas fa-heart',
			],
			'required' => [ 'display', '!=', 'text' ],
		];

		$this->controls['savedIconColor'] = [
			'label'    => esc_html__( 'Saved Icon Color', 'surecart' ),
			'type'     => 'color',
			'css'      => [
				[
					'property' => 'color',
					'selector' => '.sc-product-save-button__saved-icon',
				],
				[
					'property' => 'fill',
					'selector' => '.sc-product-save-button__saved-icon svg',
				],
			],
			'required' => [ 'display', '!=', 'text' ],
		];

		$this->controls['iconTypography'] = [
			'label'    => esc_html__( 'Icon Typography', 'surecart' ),
			'type'     => 'typography',
			'css'      => [
				[
					'property' => 'font',
					'selector' => 'i',
				],
			],
			'required' => [ 'display', '!=', 'text' ],
		];

		$this->controls['iconPosition'] = [
			'label'       => esc_html__( 'Position', 'surecart' ),
			'type'        => 'select',
			'options'     => $this->control_options['iconPosition'],
			'inline'      => true,
			'placeholder' => esc_html__( 'Left', 'surecart' ),
			'required'    => [ 'display', '=', 'both' ],
		];

		$this->controls['iconGap'] = [
			'label'    => esc_html__( 'Gap', 'surecart' ),
			'type'     => 'number',
			'units'    => true,
			'css'      => [
				[
					'property' => 'gap',
				],
			],
			'required' => [ 'display', '=', 'both' ],
		];

		// The link is the root button's next sibling, hence the `+` selectors.
		$change_required = [ [ 'display', '!=', 'icon' ], [ 'hideChangeList', '!=', true ] ];

		$this->controls['changeListSeparator'] = [
			'label'    => esc_html__( '"Change list" link', 'surecart' ),
			'type'     => 'separator',
			'required' => $change_required,
		];

		// Color is its own control: the link's theme reset reads color variables, not `color`.
		$this->controls['changeListTypography'] = [
			'label'    => esc_html__( 'Typography', 'surecart' ),
			'type'     => 'typography',
			'exclude'  => [ 'color' ],
			'css'      => [
				[
					'property' => 'font',
					'selector' => '+ .sc-saved-items-change',
				],
			],
			'required' => $change_required,
		];

		$this->controls['changeListColor'] = [
			'label'    => esc_html__( 'Color', 'surecart' ),
			'type'     => 'color',
			'css'      => [
				[
					'property' => '--sc-saved-items-change-color',
					'selector' => '+ .sc-saved-items-change',
				],
			],
			'required' => $change_required,
		];

		$this->controls['changeListHoverColor'] = [
			'label'    => esc_html__( 'Hover Color', 'surecart' ),
			'type'     => 'color',
			'css'      => [
				[
					'property' => '--sc-saved-items-change-hover-color',
					'selector' => '+ .sc-saved-items-change',
				],
			],
			'required' => $change_required,
		];

		$this->controls['changeListGap'] = [
			'label'    => esc_html__( 'Spacing', 'surecart' ),
			'type'     => 'number',
			'units'    => true,
			'css'      => [
				[
					'property' => '--sc-saved-items-change-gap',
					'selector' => '+ .sc-saved-items-change',
				],
			],
			'required' => $change_required,
		];
	}

	/**
	 * Render element.
	 *
	 * Saved state is only ever set in the browser, so full-page caching can't leak one
	 * shopper's list to another; the builder always previews the unsaved state.
	 *
	 * @return void
	 */
	public function render() {
		if ( ! \SureCart::saved_items()->enabled() ) {
			// Say why it's empty in the builder; shoppers see nothing.
			if ( $this->is_admin_editor() ) {
				return $this->render_element_placeholder(
					[
						'title' => esc_html__( 'Saved Items is turned off in SureCart → Settings → Design.', 'surecart' ),
					]
				);
			}
			return;
		}

		$settings      = $this->settings;
		$product       = sc_get_product();
		$display       = $settings['display'] ?? 'both';
		$show_icon     = 'text' !== $display;
		$show_text     = 'icon' !== $display;
		$icon_position = ! empty( $settings['iconPosition'] ) ? $settings['iconPosition'] : 'left';

		$this->set_attribute( '_root', 'type', 'button' );
		$this->set_attribute( '_root', 'class', 'bricks-button' );
		$this->set_attribute( '_root', 'class', 'sc-product-save-button' );
		// Visible text is the accessible name when shown, so voice control can match it. A toggle's
		// name must not change, so only the icon-only button is a pressed toggle; text says "Saved".
		if ( ! $show_text ) {
			$this->set_attribute( '_root', 'aria-pressed', 'false' );
			// No product in a template preview.
			$this->set_attribute( '_root', 'aria-label', ! empty( $product->name ) ? sprintf( /* translators: %s: product name */ __( 'Save %s for later', 'surecart' ), $product->name ) : __( 'Save for later', 'surecart' ) );
		}

		if ( ! empty( $settings['size'] ) ) {
			$this->set_attribute( '_root', 'class', $settings['size'] );
		}

		if ( isset( $settings['outline'] ) ) {
			$this->set_attribute( '_root', 'class', 'outline' );
		}

		if ( ! empty( $settings['style'] ) ) {
			$this->set_attribute( '_root', 'class', isset( $settings['outline'] ) ? "bricks-color-{$settings['style']}" : "bricks-background-{$settings['style']}" );
		}

		if ( isset( $settings['circle'] ) ) {
			$this->set_attribute( '_root', 'class', 'circle' );
		}

		// Wire to the shared store only where it can run; the builder shows a static preview.
		if ( ! empty( $product->id ) && ! $this->is_admin_editor() ) {
			wp_enqueue_script_module( '@surecart/saved-items' );
			wp_enqueue_style( 'surecart-saved-items' );
			// Prints the toast and list picker in the footer.
			\SureCart::saved_items()->requireUi();

			$this->set_attribute( '_root', 'data-wp-interactive', wp_json_encode( [ 'namespace' => 'surecart/saved-items' ] ) );
			$this->set_attribute(
				'_root',
				'data-wp-context',
				wp_json_encode(
					[
						'productId'   => $product->id,
						'productName' => $product->name,
					],
					JSON_HEX_TAG | JSON_HEX_APOS | JSON_HEX_QUOT | JSON_HEX_AMP
				)
			);
			$this->set_attribute( '_root', 'data-wp-class--is-saved', 'state.isPressed' );
			if ( ! $show_text ) {
				$this->set_attribute( '_root', 'data-wp-bind--aria-pressed', 'state.isPressed' );
			}
			$this->set_attribute( '_root', 'data-wp-bind--aria-busy', 'state.isBusy' );
			$this->set_attribute( '_root', 'data-wp-on--click', 'actions.toggle' );
			$this->set_attribute( '_root', 'data-wp-on--mousedown', 'actions.preventMouseFocus' );
		}

		// Inline display for the swap, like the Elementor widget; theme/builder CSS can override `hidden`.
		// An icon cleared in the control renders nothing rather than a fallback.
		$has_icon = function ( $key ) use ( $settings, $show_icon ) {
			return $show_icon && ( ! empty( $settings[ $key ]['icon'] ) || ! empty( $settings[ $key ]['svg'] ) );
		};

		$icons = '';
		if ( $has_icon( 'icon' ) ) {
			$icons .= '<span class="sc-product-save-button__icon" data-wp-style--display="state.displayWhenUnsaved" aria-hidden="true">' . self::render_icon( $settings['icon'] ) . '</span>';
		}
		if ( $has_icon( 'saved_icon' ) ) {
			$icons .= '<span class="sc-product-save-button__icon sc-product-save-button__saved-icon" data-wp-style--display="state.displayWhenSaved" style="display: none;" aria-hidden="true">' . self::render_icon( $settings['saved_icon'] ) . '</span>';
		}

		$text = '';
		if ( $show_text ) {
			$text .= '<span data-wp-style--display="state.displayWhenNotSaved">' . esc_html( ! empty( $settings['content'] ) ? $settings['content'] : __( 'Save for later', 'surecart' ) ) . '</span>';
			$text .= '<span data-wp-style--display="state.displayWhenSaved" style="display: none;">' . esc_html( ! empty( $settings['saved_text'] ) ? $settings['saved_text'] : __( 'Saved', 'surecart' ) ) . '</span>';
			// Saved, but with other options now chosen on the product page.
			$text .= '<span data-wp-style--display="state.displayWhenOptions" style="display: none;">' . esc_html__( 'Save these options', 'surecart' ) . '</span>';
		}

		$output  = "<button {$this->render_attributes( '_root' )}>";
		$output .= 'right' === $icon_position ? $text . $icons : $icons . $text;
		$output .= '</button>';

		// Like the block: "· Change" beside a text-link button, else under it at the button's own
		// alignment. The builder gets a visible, inert copy so it can be styled there.
		if ( $show_text && empty( $settings['hideChangeList'] ) ) {
			$align   = ! empty( $settings['_alignSelf'] ) ? 'align-self:' . $settings['_alignSelf'] : '';
			$preview = $this->is_admin_editor();
			if ( empty( $settings['style'] ) ) {
				$change = \SureCart::saved_items()->changeButton(
					$product,
					[
						'inline'  => true,
						'preview' => $preview,
					]
				);
				$output = $change ? '<div class="sc-saved-items-change-group"' . ( $align ? ' style="' . esc_attr( $align ) . '"' : '' ) . '>' . $output . $change . '</div>' : $output;
			} else {
				$output .= \SureCart::saved_items()->changeButton(
					$product,
					[
						'style'   => $align ? $align : 'margin-inline:auto',
						'preview' => $preview,
					]
				);
			}
		}

		echo $output; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
	}
}
