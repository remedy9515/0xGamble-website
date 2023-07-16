@extends('layouts.1uck')

@section('content')

	@include('sections.top-header')

	@include('sections.title-primary', [
		'title' => 'Playing arena.',
		'subtitle' => 'Buy. Transfer. Win.',
	])

	@include('sections.pot-details', [
		'id' => 'play',
	])

	@include('sections.games', [
		'id' => 'games',
	])

	@include('sections.title-secondary', [
		'title' => 'Tokenomics.',
		'subtitle' => 'Own. Win.',
	])

	@include('sections.tokenomics', [
		'id' => 'token'
	])

	@include('sections.cosmic-gambling')

	@include('sections.story', [
		'id' => 'story',
	])

	@include('sections.faq', [
		'items' => [
			[
				'title' => 'What is 0xGamble?',
				'text' => '0xGamble is the first autonomous decentralized gambling token built on the Binance Smart Chain (BSC). It offers a transparent and immersive gambling experience, where each transaction becomes an opportunity to win the Pot.',
			],
			[
				'title' => 'How can I play the 420 Game?',
				'text' => 'Buy $1UCK tokens on PancakeSwap and hold them in your wallet. The game works by generating an almost random number using on-chain inputs such as the block hash, timestamp, and transaction data. This number is then divided by specific values like 69, 420, or 1337.<br><br>If the result is divisible by 69, the &quot;HOUSE&quot; wins the Pot.<br>If the result is divisible by 420, the &quot;PLAYER&quot; wins!<br>If the result is divisible by 1337, the Pot is &quot;BURNED&quot;.',
			],
			[
				'title' => 'Is 0xGamble safe and transparent?',
				'text' => 'Absolutely! 0xGamble&#x27;s smart contract is fully transparent, and all the game mechanics are on-chain for everyone to see. The project is community-driven and aims to maintain a high level of transparency and security.',
			],
			[
				'title' => 'How to buy 1UCK?',
				'text' => 'To buy 1UCK, follow these steps:<br>• Ensure you have a compatible crypto wallet that supports Binance Smart Chain (BSC) tokens. Popular options include MetaMask, Trust Wallet, and Binance Chain Wallet.<br>• Get BNB (Binance Coin) from a trusted exchange and transfer it to your BSC-compatible wallet. This will be used to swap for 1UCK.<br>• Go to <a href="https://pancakeswap.finance/swap?outputCurrency=0x30016A1764C93EEdCCbEE5E1b3835F191c6f4050" target="_blank" class="inline-link">PancakeSwap</a>.<br>• Adjust the slippage tolerance (~1,5%) and enter the amount of BNB you want to swap for 1UCK. Confirm the transaction and approve the token swap.<br>Once the transaction is confirmed, you should see the 1UCK tokens in your wallet&#x27;s token balance. You can now hold, trade, or participate in the 0xGamble ecosystem using your acquired 1UCK.',
			],
		],
	])

@endsection