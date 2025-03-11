<div>
    <div id="inner">
        <section class="behind-header desktop">
            <div style="background-image: url(images/contact/01.jpg);" class="bg faded"></div>
            <div class="vbottom desktop fh">
                <div class="container">
                    @if(isset($success) && !empty($success))
                    <div class="mb-lg tw:border tw:p-5">
                        {{ $success }}
                    </div>
                    @endif
                    <div class="grid mb-xl">
                        <div class="col-4">
                            <h3 class="mt-0">Let's create</h3>
                        </div>
                        <div class="col-2"><a href="mailto:{{ $contact['contact_email'] }}">{{ $contact['contact_email'] ?? '' }}</a></div>
                        <div class="col-2"><span class="label label-white">{{ $contact['contact_phone'] ?? '' }}</span></div>
                    </div>
                    <form id="form" class="vbottom-desktop grid default-form no-spacing lined-form mb-xl" wire:submit.prevent="submit" autocomplete="off">
                        @csrf
                        <div class="col-2">
                            <input required type="text" placeholder="Name" name="name" class="form-control" wire:model.defer="name">
                        </div>
                        <div class="col-2">
                            <input required type="email" placeholder="Email address" name="email" class="form-control" wire:model.defer="email">
                        </div>
                        <div class="col-2">
                            <textarea required placeholder="Message" name="message" class="small form-control" wire:model.defer="message"></textarea>
                        </div>
                        <div class="col-2">
                            <button id="send" type="submit" class="btn btn-primary" wire:loading.attr="disabled" wire:target="submit">
                                <span wire:loading.remove wire:target="submit">Send</span>
                                <span wire:loading wire:target="submit">Sending...</span>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </section>
    </div>
    <x-footer />
</div>
