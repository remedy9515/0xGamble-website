@extends('layouts.1uck')

@section('content')

	@include('sections.games.top-header', [
		'title' => '420 Game',
		'subtitle' => 'Buy, transfer, win.',
		'details' => 'Each transfer has a chance of winning and receiving the pot automatically to your wallet.',
	])

	@include('sections.games.420.game')
	
	@include('sections.games.420.how-to-play')

	@include('sections.title-secondary', [
		'title' => 'Playing arena.',
		'subtitle' => 'Buy. Transfer. Win.',
	])

	@include('sections.pot-details', [
		'id' => 'play',
	])

@endsection	