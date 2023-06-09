<?php
$unique_id = substr(uniqid(), -5);

wp_store( array(
	'state' => array(
		'wceu2023' => array(
			'selected' => null,
			'openText' => __( 'Open menu' ),
			'closeText' => __( 'Close menu' ),
		)
	),
	'selectors' => array(
		'wceu2023' => array(
			'toggleText' => __( 'Open menu' ),
		)
	)
) );
?>

<div
	<?php echo get_block_wrapper_attributes(); ?>
	data-wp-interactive
	data-wp-context='{ "wceu2023": { "id": "<?php echo $unique_id; ?>", "answer": null } }'
	data-wp-on--keydown="actions.wceu2023.closeOnEsc"
>
	<div>
		<strong>
			<?php echo __( 'Question' ) . ": "; ?>
		</strong>

		<?php echo $attributes[ 'question' ]; ?>

		<button
			data-wp-on--click="actions.wceu2023.toggle"
			data-wp-bind--aria-expanded="selectors.wceu2023.isOpen"
			aria-controls="quiz-<?php echo $unique_id; ?>"
			data-wp-text="selectors.wceu2023.toggleText"
		></button>
	</div>

	<div
		data-wp-bind--hidden="!selectors.wceu2023.isOpen"
		id="quiz-<?php echo $unique_id; ?>"
	>
		<?php if ( $attributes['typeOfQuiz'] == 'boolean' ): ?>
			<button
				data-wp-effect="effects.wceu2023.focusOnOpen"
				data-wp-on--click="actions.wceu2023.answerYes"
				data-wp-class--active="context.wceu2023.answer"
			>
				<?php echo __( 'Yes' ); ?>
			</button>
			<button
				data-wp-on--click="actions.wceu2023.answerNo"
				data-wp-class--active="!context.wceu2023.answer"
			>
				<?php echo __( 'No' ); ?>
			</button>

		<?php elseif ( $attributes['typeOfQuiz'] === 'input'): ?>
			<input
				type="text"
				data-wp-effect="effects.wceu2023.focusOnOpen"
			>

		<?php endif; ?>
	</div>
</div>
