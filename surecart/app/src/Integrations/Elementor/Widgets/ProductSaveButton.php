<?php

namespace SureCart\Integrations\Elementor\Widgets;

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

/**
 * Save for later (wishlist) button widget.
 *
 * Elementor counterpart of the `surecart/product-save-button` block. Renders native
 * Elementor button markup wired to the same `surecart/saved-items` store, so it works on
 * the product page and inside a product card (loop item).
 */
class ProductSaveButton extends \Elementor\Widget_Base {
	/**
	 * Default (not saved) icon.
	 */
	public const DEFAULT_ICON = array(
		'value'   => 'far fa-heart',
		'library' => 'fa-regular',
	);

	/**
	 * Icon once the product is saved: a filled heart.
	 */
	public const DEFAULT_SAVED_ICON = array(
		'value'   => 'fas fa-heart',
		'library' => 'fa-solid',
	);

	/**
	 * Get widget name.
	 *
	 * @return string
	 */
	public function get_name() {
		return 'surecart-product-save-button';
	}

	/**
	 * Get widget title.
	 *
	 * @return string
	 */
	public function get_title() {
		return esc_html__( 'Save for Later Button', 'surecart' );
	}

	/**
	 * Get widget icon.
	 *
	 * @return string
	 */
	public function get_icon() {
		return 'eicon-heart-o';
	}

	/**
	 * Get the widget keywords.
	 *
	 * @return array
	 */
	public function get_keywords() {
		return array( 'surecart', 'wishlist', 'save', 'favorite', 'heart', 'later' );
	}

	/**
	 * Get the widget categories.
	 *
	 * @return array
	 */
	public function get_categories() {
		return array( 'surecart-elementor-elements' );
	}

	/**
	 * Get the style dependencies.
	 *
	 * @return array
	 */
	public function get_style_depends() {
		return array( 'surecart-wp-button' );
	}

	/**
	 * Get the script dependencies.
	 *
	 * The saved-items script module reads these classic globals (wp.apiFetch, wp.url, wp.i18n).
	 *
	 * @return array
	 */
	public function get_script_depends() {
		return array( 'wp-api-fetch', 'wp-url', 'wp-i18n' );
	}

	/**
	 * Register the widget content settings.
	 *
	 * @return void
	 */
	protected function register_content_settings() {
		$this->start_controls_section(
			'section_content',
			[
				'label' => esc_html__( 'Content', 'surecart' ),
			]
		);

		$this->add_control(
			'display',
			[
				'label'   => esc_html__( 'Icon & Text', 'surecart' ),
				'type'    => \Elementor\Controls_Manager::SELECT,
				'default' => 'both',
				'options' => [
					'both' => esc_html__( 'Both', 'surecart' ),
					'icon' => esc_html__( 'Icon', 'surecart' ),
					'text' => esc_html__( 'Text', 'surecart' ),
				],
			]
		);

		// Placeholders, not defaults: left empty, the text is translated at render, so it follows the site language.
		$this->add_control(
			'button_text',
			[
				'label'       => esc_html__( 'Button Text', 'surecart' ),
				'type'        => \Elementor\Controls_Manager::TEXT,
				'placeholder' => esc_html__( 'Save for later', 'surecart' ),
				'condition'   => [ 'display!' => 'icon' ],
			]
		);

		$this->add_control(
			'saved_text',
			[
				'label'       => esc_html__( 'Saved Text', 'surecart' ),
				'type'        => \Elementor\Controls_Manager::TEXT,
				'placeholder' => esc_html__( 'Saved', 'surecart' ),
				'description' => esc_html__( 'Shown once the product is saved.', 'surecart' ),
				'condition'   => [ 'display!' => 'icon' ],
			]
		);

		$this->add_control(
			'show_change_list',
			[
				'label'       => esc_html__( 'Show "Change list" link', 'surecart' ),
				'type'        => \Elementor\Controls_Manager::SWITCHER,
				'default'     => 'yes',
				'description' => esc_html__( 'Signed-in customers see it once the product is saved.', 'surecart' ),
				'condition'   => [ 'display!' => 'icon' ],
			]
		);

		// Elementor has no "no style" button to detect a text link by, unlike Bricks, so it's a choice.
		$this->add_control(
			'change_list_position',
			[
				'label'     => esc_html__( '"Change list" position', 'surecart' ),
				'type'      => \Elementor\Controls_Manager::SELECT,
				'default'   => 'below',
				'options'   => [
					'below'  => esc_html__( 'Under the button', 'surecart' ),
					'inline' => esc_html__( 'Beside the button', 'surecart' ),
				],
				'condition' => [
					'display!'         => 'icon',
					'show_change_list' => 'yes',
				],
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'section_icon_settings',
			[
				'label'     => esc_html__( 'Icon', 'surecart' ),
				'condition' => [ 'display!' => 'text' ],
			]
		);

		$this->add_control(
			'selected_icon',
			[
				'label'       => esc_html__( 'Icon', 'surecart' ),
				'type'        => \Elementor\Controls_Manager::ICONS,
				'skin'        => 'inline',
				'label_block' => false,
				'default'     => self::DEFAULT_ICON,
				'recommended' => [
					'fa-regular' => [ 'heart', 'bookmark', 'star' ],
				],
			]
		);

		$this->add_control(
			'saved_icon',
			[
				'label'       => esc_html__( 'Saved Icon', 'surecart' ),
				'type'        => \Elementor\Controls_Manager::ICONS,
				'skin'        => 'inline',
				'label_block' => false,
				'default'     => self::DEFAULT_SAVED_ICON,
				'recommended' => [
					'fa-solid' => [ 'heart', 'bookmark', 'star' ],
				],
			]
		);

		$this->add_control(
			'icon_align',
			[
				'label'     => esc_html__( 'Icon Position', 'surecart' ),
				'type'      => \Elementor\Controls_Manager::CHOOSE,
				'default'   => 'row',
				'options'   => [
					'row'         => [
						'title' => esc_html__( 'Start', 'surecart' ),
						'icon'  => 'eicon-h-align-left',
					],
					'row-reverse' => [
						'title' => esc_html__( 'End', 'surecart' ),
						'icon'  => 'eicon-h-align-right',
					],
				],
				'selectors' => [
					'{{WRAPPER}} .elementor-button-content-wrapper' => 'flex-direction: {{VALUE}};',
				],
				'condition' => [ 'display' => 'both' ],
			]
		);

		$this->add_control(
			'icon_indent',
			[
				'label'      => esc_html__( 'Icon Spacing', 'surecart' ),
				'type'       => \Elementor\Controls_Manager::SLIDER,
				'size_units' => [ 'px', 'em', 'rem' ],
				'range'      => [
					'px' => [ 'max' => 50 ],
				],
				'default'    => [
					'size' => 8,
					'unit' => 'px',
				],
				'selectors'  => [
					'{{WRAPPER}} .elementor-button-content-wrapper' => 'gap: {{SIZE}}{{UNIT}};',
				],
				'condition'  => [ 'display' => 'both' ],
			]
		);

		$this->end_controls_section();
	}

	/**
	 * Register the widget style settings.
	 *
	 * @return void
	 */
	protected function register_style_settings() {
		$button_selector = '{{WRAPPER}} .sc-product-save-button';
		$saved_selector  = '{{WRAPPER}} .sc-product-save-button.is-saved';

		$this->start_controls_section(
			'section_style',
			[
				'label' => esc_html__( 'Button', 'surecart' ),
				'tab'   => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name'     => 'button_typography',
				'global'   => [
					'default' => \Elementor\Core\Kits\Documents\Tabs\Global_Typography::TYPOGRAPHY_PRIMARY,
				],
				'selector' => $button_selector,
			]
		);

		$this->add_responsive_control(
			'icon_size',
			[
				'label'      => esc_html__( 'Icon Size', 'surecart' ),
				'type'       => \Elementor\Controls_Manager::SLIDER,
				'size_units' => [ 'px', 'em', 'rem' ],
				'range'      => [
					'px' => [ 'max' => 100 ],
				],
				'selectors'  => [
					'{{WRAPPER}} .elementor-button-icon' => 'font-size: {{SIZE}}{{UNIT}};',
				],
				'condition'  => [ 'display!' => 'text' ],
			]
		);

		$this->start_controls_tabs( 'button_colors' );

		$this->start_controls_tab(
			'button_colors_normal',
			[
				'label' => esc_html__( 'Normal', 'surecart' ),
			]
		);

		$this->add_control(
			'button_text_color',
			[
				'label'     => esc_html__( 'Text Color', 'surecart' ),
				'type'      => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					$button_selector => 'color: {{VALUE}};',
					$button_selector . ' .elementor-button-icon svg' => 'fill: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'button_background_color',
			[
				'label'     => esc_html__( 'Background Color', 'surecart' ),
				'type'      => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					$button_selector => 'background-color: {{VALUE}};',
				],
			]
		);

		$this->end_controls_tab();

		$this->start_controls_tab(
			'button_colors_hover',
			[
				'label' => esc_html__( 'Hover', 'surecart' ),
			]
		);

		$this->add_control(
			'button_hover_text_color',
			[
				'label'     => esc_html__( 'Text Color', 'surecart' ),
				'type'      => \Elementor\Controls_Manager::COLOR,
				// Includes the saved icon, so a filled hover background can't hide it.
				'selectors' => [
					$button_selector . ':hover' => 'color: {{VALUE}};',
					$button_selector . ':hover .elementor-button-icon, ' . $saved_selector . ':hover .elementor-button-icon' => 'color: {{VALUE}};',
					$button_selector . ':hover .elementor-button-icon svg, ' . $saved_selector . ':hover .elementor-button-icon svg' => 'fill: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'button_hover_background_color',
			[
				'label'     => esc_html__( 'Background Color', 'surecart' ),
				'type'      => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					$button_selector . ':hover' => 'background-color: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'button_hover_border_color',
			[
				'label'     => esc_html__( 'Border Color', 'surecart' ),
				'type'      => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					$button_selector . ':hover' => 'border-color: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'hover_animation',
			[
				'label' => esc_html__( 'Hover Animation', 'surecart' ),
				'type'  => \Elementor\Controls_Manager::HOVER_ANIMATION,
			]
		);

		$this->end_controls_tab();

		$this->start_controls_tab(
			'button_colors_saved',
			[
				'label' => esc_html__( 'Saved', 'surecart' ),
			]
		);

		$this->add_control(
			'saved_icon_color',
			[
				'label'     => esc_html__( 'Icon Color', 'surecart' ),
				'type'      => \Elementor\Controls_Manager::COLOR,
				'global'    => [
					'default' => \Elementor\Core\Kits\Documents\Tabs\Global_Colors::COLOR_PRIMARY,
				],
				'selectors' => [
					$saved_selector . ' .elementor-button-icon'     => 'color: {{VALUE}};',
					$saved_selector . ' .elementor-button-icon svg' => 'fill: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'saved_text_color',
			[
				'label'     => esc_html__( 'Text Color', 'surecart' ),
				'type'      => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					$saved_selector => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'saved_background_color',
			[
				'label'     => esc_html__( 'Background Color', 'surecart' ),
				'type'      => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					$saved_selector => 'background-color: {{VALUE}};',
				],
			]
		);

		$this->end_controls_tab();

		$this->end_controls_tabs();

		$this->add_responsive_control(
			'button_width',
			[
				'label'      => esc_html__( 'Width', 'surecart' ),
				'type'       => \Elementor\Controls_Manager::SLIDER,
				'size_units' => [ 'px', 'em', '%' ],
				'range'      => [
					'px' => [ 'max' => 1000 ],
				],
				'selectors'  => [
					$button_selector => 'width: {{SIZE}}{{UNIT}};',
				],
				'separator'  => 'before',
			]
		);

		$this->add_responsive_control(
			'align',
			[
				'label'     => esc_html__( 'Position', 'surecart' ),
				'type'      => \Elementor\Controls_Manager::CHOOSE,
				'options'   => [
					'left'   => [
						'title' => esc_html__( 'Left', 'surecart' ),
						'icon'  => 'eicon-h-align-left',
					],
					'center' => [
						'title' => esc_html__( 'Center', 'surecart' ),
						'icon'  => 'eicon-h-align-center',
					],
					'right'  => [
						'title' => esc_html__( 'Right', 'surecart' ),
						'icon'  => 'eicon-h-align-right',
					],
				],
				// The button is inline-block (sc-button__link), so it follows the widget's text-align.
				// "Change list" reads the variable, so it centers under a full-width button until a position is set.
				'selectors' => [
					'{{WRAPPER}}' => 'text-align: {{VALUE}}; --sc-saved-items-change-align: {{VALUE}};',
				],
			]
		);

		$this->add_responsive_control(
			'button_padding',
			[
				'label'      => esc_html__( 'Padding', 'surecart' ),
				'type'       => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', 'em', '%' ],
				'selectors'  => [
					$button_selector => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Border::get_type(),
			[
				'name'     => 'button_border',
				'selector' => $button_selector,
			]
		);

		$this->add_responsive_control(
			'button_border_radius',
			[
				'label'      => esc_html__( 'Border Radius', 'surecart' ),
				'type'       => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', 'em', '%' ],
				'selectors'  => [
					$button_selector => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Box_Shadow::get_type(),
			[
				'name'     => 'button_box_shadow',
				'selector' => $button_selector,
			]
		);

		$this->end_controls_section();

		$change_selector = '{{WRAPPER}} .sc-saved-items-change';

		$this->start_controls_section(
			'section_change_list_style',
			[
				'label'     => esc_html__( '"Change list" link', 'surecart' ),
				'tab'       => \Elementor\Controls_Manager::TAB_STYLE,
				'condition' => [
					'display!'         => 'icon',
					'show_change_list' => 'yes',
				],
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name'     => 'change_list_typography',
				'global'   => [
					'default' => \Elementor\Core\Kits\Documents\Tabs\Global_Typography::TYPOGRAPHY_PRIMARY,
				],
				'selector' => $change_selector,
			]
		);

		// Sets variables, not `color`: the link's theme reset reads them.
		$this->add_control(
			'change_list_color',
			[
				'label'     => esc_html__( 'Text Color', 'surecart' ),
				'type'      => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					$change_selector => '--sc-saved-items-change-color: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'change_list_hover_color',
			[
				'label'     => esc_html__( 'Hover Color', 'surecart' ),
				'type'      => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					$change_selector => '--sc-saved-items-change-hover-color: {{VALUE}};',
				],
			]
		);

		$this->add_responsive_control(
			'change_list_spacing',
			[
				'label'      => esc_html__( 'Spacing', 'surecart' ),
				'type'       => \Elementor\Controls_Manager::SLIDER,
				'size_units' => [ 'px', 'em' ],
				'selectors'  => [
					$change_selector => '--sc-saved-items-change-gap: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->end_controls_section();
	}

	/**
	 * Register the widget controls.
	 *
	 * @return void
	 */
	protected function register_controls() {
		$this->register_content_settings();
		$this->register_style_settings();
	}

	/**
	 * Render the widget output on the frontend and in the editor preview.
	 *
	 * Saved state is only ever set in the browser, so full-page caching can't leak one
	 * shopper's list to another; the editor always previews the unsaved state.
	 *
	 * @return void
	 */
	protected function render() {
		if ( ! \SureCart::saved_items()->enabled() ) {
			// Say why it's empty in the editor; shoppers see nothing.
			if ( \Elementor\Plugin::$instance->editor->is_edit_mode() ) {
				echo '<div class="elementor-alert elementor-alert-info">' . esc_html__( 'Saved Items is turned off in SureCart → Settings → Design.', 'surecart' ) . '</div>';
			}
			return;
		}

		$settings  = $this->get_settings_for_display();
		$product   = sc_get_product();
		$display   = $settings['display'] ?? 'both';
		$show_icon = 'text' !== $display;
		$show_text = 'icon' !== $display;
		$name      = $product->name ?? '';

		$this->add_render_attribute(
			'button',
			[
				'type'         => 'button',
				// Same class set as the Add To Cart widget, so both pick up the same theme button styles.
				'class' => 'wp-block-button__link wp-element-button sc-button__link elementor-button elementor-size-sm sc-product-save-button',
			]
		);

		// Visible text is the accessible name when shown, so voice control can match it. A toggle's
		// name must not change, so only the icon-only button is a pressed toggle; text says "Saved".
		if ( ! $show_text ) {
			$this->add_render_attribute( 'button', 'aria-pressed', 'false' );
			// No product in a template preview.
			$this->add_render_attribute( 'button', 'aria-label', $name ? sprintf( /* translators: %s: product name */ __( 'Save %s for later', 'surecart' ), $name ) : __( 'Save for later', 'surecart' ) );
		}

		if ( ! empty( $settings['hover_animation'] ) ) {
			$this->add_render_attribute( 'button', 'class', 'elementor-animation-' . $settings['hover_animation'] );
		}

		// Wire to the shared store only where it can run; the editor shows a static preview.
		if ( ! empty( $product->id ) && ! \Elementor\Plugin::$instance->editor->is_edit_mode() ) {
			wp_enqueue_script_module( '@surecart/saved-items' );
			wp_enqueue_style( 'surecart-saved-items' );
			// Prints the toast and list picker in the footer.
			\SureCart::saved_items()->requireUi();

			$this->add_render_attribute(
				'button',
				[
					'data-wp-interactive'     => wp_json_encode( [ 'namespace' => 'surecart/saved-items' ] ),
					'data-wp-context'         => wp_json_encode(
						[
							'productId'   => $product->id,
							'productName' => $product->name,
						],
						JSON_HEX_TAG | JSON_HEX_APOS | JSON_HEX_QUOT | JSON_HEX_AMP
					),
					'data-wp-class--is-saved' => 'state.isPressed',
					'data-wp-bind--aria-busy' => 'state.isBusy',
					'data-wp-on--click'       => 'actions.toggle',
					'data-wp-on--mousedown'   => 'actions.preventMouseFocus',
				]
			);
			if ( ! $show_text ) {
				$this->add_render_attribute( 'button', 'data-wp-bind--aria-pressed', 'state.isPressed' );
			}
		}

		$change = '';
		$inline = false;
		if ( $show_text && 'yes' === ( $settings['show_change_list'] ?? '' ) ) {
			// The editor gets a visible, inert copy so it can be styled there.
			$preview = \Elementor\Plugin::$instance->editor->is_edit_mode();
			if ( $preview ) {
				wp_enqueue_style( 'surecart-saved-items' );
			}
			$inline = 'inline' === ( $settings['change_list_position'] ?? '' );
			$change = \SureCart::saved_items()->changeButton(
				$product,
				[
					'inline'  => $inline,
					'preview' => $preview,
				]
			);
		}
		?>
		<?php // One row for "· Change list" beside the button; it follows the widget's text-align. ?>
		<?php if ( $change && $inline ) : ?>
			<div class="sc-saved-items-change-group">
		<?php endif; ?>
		<?php // Elementor gives these spans a display value, so the swap uses inline display, not `hidden`. ?>
		<button <?php $this->print_render_attribute_string( 'button' ); ?>>
			<span class="elementor-button-content-wrapper">
				<?php // "None" in the icon control clears the value, so render nothing rather than a fallback. ?>
				<?php if ( $show_icon && ! empty( $settings['selected_icon']['value'] ) ) : ?>
					<span class="elementor-button-icon" data-wp-style--display="state.displayWhenUnsaved" aria-hidden="true">
						<?php \Elementor\Icons_Manager::render_icon( $settings['selected_icon'], [ 'aria-hidden' => 'true' ] ); ?>
					</span>
				<?php endif; ?>
				<?php if ( $show_icon && ! empty( $settings['saved_icon']['value'] ) ) : ?>
					<span class="elementor-button-icon" data-wp-style--display="state.displayWhenSaved" style="display: none;" aria-hidden="true">
						<?php \Elementor\Icons_Manager::render_icon( $settings['saved_icon'], [ 'aria-hidden' => 'true' ] ); ?>
					</span>
				<?php endif; ?>
				<?php if ( $show_text ) : ?>
					<span class="elementor-button-text" data-wp-style--display="state.displayWhenNotSaved"><?php echo esc_html( ! empty( $settings['button_text'] ) ? $settings['button_text'] : __( 'Save for later', 'surecart' ) ); ?></span>
					<span class="elementor-button-text" data-wp-style--display="state.displayWhenSaved" style="display: none;"><?php echo esc_html( ! empty( $settings['saved_text'] ) ? $settings['saved_text'] : __( 'Saved', 'surecart' ) ); ?></span>
					<?php // Saved, but with other options now chosen on the product page. ?>
					<span class="elementor-button-text" data-wp-style--display="state.displayWhenOptions" style="display: none;"><?php esc_html_e( 'Save these options', 'surecart' ); ?></span>
				<?php endif; ?>
			</span>
		</button>
		<?php if ( $change && $inline ) : ?>
				<?php echo $change; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- escaped in the helper. ?>
			</div>
		<?php elseif ( $change ) : ?>
			<?php // Its own line, so it follows the widget's text-align like the button. ?>
			<div class="sc-saved-items-change-row">
				<?php echo $change; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- escaped in the helper. ?>
			</div>
		<?php endif; ?>
		<?php
	}
}
