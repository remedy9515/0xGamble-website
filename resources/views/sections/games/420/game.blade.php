<section id="420game" class="_420-game wf-section">
	<style>
		.split-number {
			white-space: pre-wrap;
			word-wrap: break-word;
		}
		.random-number-message.split-number {
			font-size: 3rem;
			line-height: 3.1rem;
		}
		.random-number-message-small.split-number {
			font-size: 2rem;
			line-height: 2.1rem;
			padding: 0;
			color: lightgoldenrodyellow;
		}
	</style>
	<div class="game-container">
		
		@include('components.wallet')

		<div id="random-number-block" class="item-holder">
			<div class="placeholder-text">Max 1UCK to use for this round (at least one 1UCK)</div>
			<div class="form-block">
				<form id="form-1ucky-number" name="form-1ucky-number" data-name="Lucky Number" method="get" class="form">
					<input id="range-input" disabled type="number" step="0.01" min="1" class="usernumber w-input" maxlength="256" name="Max-1UCK-Input" data-name="Max 1UCK Input" placeholder="123456" required="">
				</form>
			</div>
			<a id="range-submit-button" href="javascript:void(0)" class="submit-button w-inline-block">
				<div class="indicator is--wallet">GENERATE 1UCKY NUMBER</div>
			</a>
		</div>

		<div id="random-number-message" class="_1ucky-number-generated split-number _1ucky random-number-message"></div>
		<p id="random-number-message-small" style="display: none;" class="_1ucky-number-generated split-number random-number-message-small"></p>

		<div id="game-loader" class="dice-animation" style="display: none;">
		    <img src="/images/dice-1.svg" loading="lazy" style="opacity:0" data-w-id="fb0a1467-7936-5f4d-8b8a-801feefb47c8" alt="" class="dice">
		    <img src="/images/dice-2.svg" loading="lazy" style="opacity:0" data-w-id="bc3c38a8-c19e-3a08-1925-52f151067f70" alt="" class="dice">
		    <img src="/images/dice-3.svg" loading="lazy" style="opacity:0" data-w-id="1f9ac5f0-3171-0f59-3b59-73a2cfacd2cf" alt="" class="dice">
		</div>

		<div id="1ucky-number-block" style="display: none;" class="form-block">
			<form id="form-1ucky-number-play" name="form-1ucky-number-play" data-name="Lucky Number" method="get" class="form" data-wf-page-id="64a134825fdd66827252008a" data-wf-element-id="8574135b-3b2f-2fe4-e9df-29b2aacb7dd3">
				<input type="hidden" disabled id="1ucky-number" name="1ucky-number" value="0">
			</form>
			<a id="play-submit-button" href="javascript:void(0)" class="submit-button w-inline-block">
				<div class="indicator is--wallet">SEND 1UCKY NUMBER</div>
			</a>
			{{-- <div class="success-message-2 w-form-done">
				<div class="text-block-14">sent to the cosmic roulette</div>
			</div> --}}
			<div id="error-1ucky-number" class="error-message-2 w-form-fail">
				<div class="text-block-13">Oops! Something went wrong. Try again?</div>
			</div>
		</div>

		<div class="item-holder">
			<div class="balance-title">Current Pot</div>
			<div class="balance">
				<div class="balance-amount valance-value potamount"><span>Loading...</span></div>
				<div class="balance-amount token">1UCK</div>
			</div>
		</div>

		<img src="/images/420-main.svg" loading="lazy" alt="" class="_420-game-ill">
	</div>
</section>

@pushOnce('scripts')

	@vite('resources/js/games/420.js')

@endPushOnce