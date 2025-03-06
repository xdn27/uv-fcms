<div>
    <div id="inner">
        <section class="mb-xl">
            <div class="hero behind-header small">
                <div style="background-image: url('{{ asset('storage/'.$data['banner']) }}');" class="bg faded"></div>
                <div class="vbottom">
                    <div class="container">
                        <div class="grid mb-md">
                            <div class="col-8">
                                <h1 class="animatedText">{{ $data['title'] }}</h1>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="mb-xl">
            <div class="container">
                <div class="grid">
                    <div class="col-3">
                        @if(isset($data['body_json']['left']) && !empty($data['body_json']['left']))
                            @blocks($data['body_json']['left'])
                        @endif
                    </div>
                    <div class="col-2 col-offset-1">
                        @if(isset($data['body_json']['middle']) && !empty($data['body_json']['middle']))
                            @blocks($data['body_json']['middle'])
                        @endif
                    </div>
                    <div class="col-2">
                        @if(isset($data['body_json']['right']) && !empty($data['body_json']['right']))
                            @blocks($data['body_json']['right'])
                        @endif
                    </div>
                </div>
            </div>
        </section>
    </div>
    <x-footer />
</div>
