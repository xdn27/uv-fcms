<div>
    <div id="inner">
        <section class="behind-header desktop">
            <div style="background-image: url(images/contact/01.jpg);" class="bg faded"></div>
            <div class="vbottom desktop fh">
                <div class="container">
                    <div class="grid mb-xl">
                        <div class="col-4">
                            <h3 class="mt-0">Let's create</h3>
                        </div>
                        <div class="col-2"><a href="mailto:peel@example.com">peel@example.com</a></div>
                        <div class="col-2"><span class="label label-white">12 (2) 4567 890</span></div>
                    </div>
                    <form id="form" action="php/mail.php" class="vbottom-desktop grid default-form no-spacing lined-form mb-xl">
                        <div class="col-2">
                            <input required type="text" placeholder="Name" name="name" class="form-control">
                        </div>
                        <div class="col-2">
                            <input required type="email" placeholder="Email address" name="email" class="form-control">
                        </div>
                        <div class="col-2">
                            <textarea required placeholder="Message" name="message" class="small form-control"></textarea>
                        </div>
                        <div class="col-2">
                            <input id="send" type="submit" value="Send" class="btn btn-primary">
                        </div>
                    </form>
                </div>
            </div>
        </section>
    </div>
    <x-footer />
</div>
