<div class="wallet-container">
	<style type="text/css">
		.wallet-container {
			width: 100%;
			max-width: 66.5rem;
			grid-column-gap: 2.5rem;
			grid-row-gap: 2.5rem;
			background-color: #7c6db9;
			border-radius: 40px;
			flex-direction: column;
			justify-content: flex-start;
			align-items: center;
			margin-left: auto;
			margin-right: auto;
			display: flex;
		}
	</style>

	<div class="wallet-button wallet-button is-not-connected">
		<a href="javascript:void(0)" class="uui-button-2 is-button-large is-wallet-connect w-inline-block">
			<div class="indicator is--wallet">CONNECT WALLET</div>
		</a>
	</div>
	<div style="display:none" class="wallet-button is-connected">
		<a href="javascript:void(0)" class="uui-button-2 is-button-large is-wallet-connect w-inline-block">
			<div class="indicator is--new wallet-address">CONNECTED</div>
			<div class="indicator is--wallet"></div>
		</a>
		<a href="javascript:void(0)" class="close-link w-inline-block is-wallet-disconnect">
			<img src="/images/close-icon.svg" loading="lazy" alt="" class="image-10">
		</a>
	</div>
	<div class="item-holder">
		<div class="balance-title">Your Balance</div>
		<div class="player-balance balance">
			<div class="balance-amount balance-value">0.00</div>
			<div class="balance-amount token">1UCK</div>
		</div>
	</div>
</div>

@pushOnce('scripts')

	@vite('resources/js/sections/wallet.js')

@endPushOnce