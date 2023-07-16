<section {{ isset($id) ? 'id='.$id.'' : '' }} class="faq">
	<div class="uui-page-padding-4">
		<div class="uui-container-large-3">
			<div class="uui-padding-vertical-xhuge-2">
				<div class="uui-text-align-center-3">
					<div class="uui-max-width-large-3 align-center"></div>
				</div>
				<div class="uui-faq01_component">
					<div class="uui-faq01_list">

						@each('sections.faq.item', $items, 'item')
						
					</div>
				</div>
			</div>
		</div>
	</div>
</section>