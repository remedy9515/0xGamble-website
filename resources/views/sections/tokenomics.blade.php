<section {{ isset($id) ? 'id='.$id.'' : '' }} class="tokenomics wf-section">
	<div class="main-container is--transparent">
		<div class="two-col">
			<div class="col-wider">
				<img src="/images/chips.svg" loading="lazy" alt="" class="image-3">
				<div class="info-bg no-hover">
					<div class="mouse-copy">Symbol</div>
					<div class="symbol-text">1UCK</div>
				</div>
				<a fs-copyclip-text="0x30016a1764c93eedccbee5e1b3835f191c6f4050" fs-copyclip-element="click" data-w-id="f799ac2d-8d32-45ac-2cb9-c5d35dfdcdda" href="#" class="address-copy w-inline-block">
					<div class="info-bg">
						<div class="mouse-copy">Contract Address (Tap to copy)</div>
						<div class="token-address">0x300116 ... 1c6f4050</div>
					</div>
					<div style="opacity:0;-webkit-transform:translate3d(null, 5px, 0) scale3d(1, 1, 1) rotateX(0) rotateY(0) rotateZ(0) skew(0, 0);-moz-transform:translate3d(null, 5px, 0) scale3d(1, 1, 1) rotateX(0) rotateY(0) rotateZ(0) skew(0, 0);-ms-transform:translate3d(null, 5px, 0) scale3d(1, 1, 1) rotateX(0) rotateY(0) rotateZ(0) skew(0, 0);transform:translate3d(null, 5px, 0) scale3d(1, 1, 1) rotateX(0) rotateY(0) rotateZ(0) skew(0, 0);display:none" class="tooltip">
						<div class="tooltip-text">Copied</div>
					</div>
				</a>
				<a href="https://pancakeswap.finance/swap?outputCurrency=0x30016A1764C93EEdCCbEE5E1b3835F191c6f4050" target="_blank" class="uui-button-2 is-button-large is--wide w-inline-block">
					<div class="indicator">BUY ON PANCAKESWAP</div>
				</a>
			</div>
			<div class="col-narrower">
				<div class="text-row">
					<div class="item-name">Max Supply</div>
					<div class="item-value">123,456,789 <span class="has-opacity">1UCK</span></div>
				</div>
				<div class="text-row">
					<div class="item-name">Current Supply</div>
					<div class="item-value-wrapper">
						<div class="item-value 1uck-totalSupply">Loading...</div>
						<div class="item-value has-opacity">1UCK</div>
					</div>
				</div>
				<div class="text-row">
					<div class="item-name">Burned</div>
					<div class="item-value-wrapper">
						<div class="item-value 1uck-burnedTokens">Loading...</div>
						<div class="item-value has-opacity">1UCK</div>
					</div>
				</div>
				<div class="text-row">
					<div class="item-name">Tax</div>
					<div class="item-value">1% <span class="is--smol">(50%  Pot, 50% Burned)</span></div>
				</div>
				<div class="text-row">
					<div class="item-name">Liquidity</div>
					<div class="item-value">90% <span class="is--smol">(Locked 1337 yrs)</span></div>
				</div>
				<img src="/images/dices.svg" loading="lazy" alt="" class="image-4">
			</div>
		</div>
	</div>
</section>

@pushOnce('scripts')

	@vite('resources/js/sections/tokenomics.js')

@endPushOnce