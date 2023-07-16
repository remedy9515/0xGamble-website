<header class="header">
    <div class="uui-page-padding-2">
        <div class="uui-container-large-2">
            <div class="uui-space-xhuge is-less-huge"></div>
            <div class="uui-heroheader16_component">
                <div class="uui-text-align-center-2">
                    <div class="uui-max-width-xlarge-2">
                        
                        {{-- @include('components.top-header-news') --}}

                        <div class="uui-space-small-2"></div>
                        <h1 class="uui-heading-xlarge-2">{{ $title }}</h1>
                        <h1 class="uui-heading-medium">{{ $subtitle }}</h1>
                        <div class="uui-space-small-2"></div>
                        <div class="uui-max-width-large-2 align-center max-width">
                            <div class="uui-text-size-xlarge-2">{{ $details }}</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>