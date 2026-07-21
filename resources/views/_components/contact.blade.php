<section class="contact">
    <div class="contact-inner">
        <div class="section-top">
            <span>/ Social channels / P. 006</span>
        </div>
        <div class="contact-content" id="contact">
            <span>Let's make something legendary.</span>
            <jk-popup>
                <template #target="{ togglePopup }">
                    <button @click="togglePopup">
                        Let's get in contact
                    </button>
                </template>

                <template #content>
                    <div class="popover-form">
                        <jk-contact-form></jk-contact-form>
                    </div>
                </template>
            </jk-popup>

            <div class="contact-gradient"></div>

            <div class="contact-links">
                <div class="contact-socials">
                    <a target="_blank" href="https://www.github.com/JirzyKerklaan">Github</a>
                    <a target="_blank" href="https://www.linkedin.com/in/jirzy-kerklaan">LinkedIn</a>
                    <a target="_blank" href="https://www.instagram.com/jirzy_kerklaan">Instagram</a>
                </div>
                <div class="contact-certificates">
                    <a target="_blank" href="https://certificates.dev/laravel/certificates/a1b2276b-8e6a-4690-93b4-1a10b09175d6">
                        @include('certificates.junior-certificate')
                    </a>
                </div>
            </div>
        </div>

        <div class="contact-copyright">
            <span>&copy; {{\Carbon\Carbon::now()->format('Y')}} Jirzy Kerklaan - jirzykerklaan.com</span>
        </div>
    </div>
</section>
