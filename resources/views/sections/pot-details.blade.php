<section {{ isset($id) ? 'id='.$id.'' : '' }} class="pot-details wf-section">
	<div class="main-container">
		<div class="roulette-container">
			<div class="pot-size">
				<div class="pot-size-txt">Pot Size</div>
				<div class="potamount"><span class="1uck-pot">LOADING...</span> 1UCK</div>
				<a href="#games" class="uui-button-2 is-button-medium w-inline-block">
					<div class="indicator">PLAY TO WIN</div>
				</a>
			</div>
			<img src="/images/rotating-roulette.svg" loading="lazy" alt="" class="rotating-roulette">
		</div>
		<div class="history">
			
			{{-- @include('components.pot-history') --}}
			
			<div class="disclaimer">Cryptocurrency investments come with inherent risks, and it is essential to conduct thorough research and exercise caution before engaging in any crypto-related activities.</div>
		</div>
	</div>
</section>

@pushOnce('scripts')

	@vite('resources/js/sections/pot-details.js')

@endPushOnce