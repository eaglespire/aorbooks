@extends('layouts.master')
@section('content')
    <div class="row justify-content-center rbto">
        <div class="col-md-12">
            <div class="card card-body">
                <h1 class="font-weight-bolder">Terms of use</h1>
                <p class="font-weight-bold">This Agreement was last revised on July 22, 2021.</p>
                <p>
                    Welcome to {{ config('app.name') }}. We reserve the right to amend this Agreement at any time in our sole discretion by posting the revised Agreement on the {{ config('app.name') }} website. Your continued use of the Service after any such changes constitutes your acceptance of the revised Agreement. This Agreement applies to all visitors, users, and others who access the Service ("Users").
                </p>
                <div>
                    <h4 class="font-weight-bold">Use of Our Service</h4>
                    <p>
                        {{ config('app.name') }} provides a place for you to discover, track, and talk about books with friends.
                    </p>
                    <p>
                        In order to access the major features of the Service, you need to register for a free account.Your account gives you access to the services and functionality that we may establish and maintain from time to time and in our sole discretion.
                    </p>
                    <p>
                        You may never use another Member’s account without permission. You are responsible for maintaining the confidentiality of your account and password and for restricting access to your account, and you agree to accept responsibility for all activities that occur under your account or password. You agree to notify Goodreads immediately of any breach of security or unauthorized use of your account.
                    </p>
                    <p>
                        You may change the settings on your profile page to control your profile. By providing {{ config('app.name') }} your email address you consent to our using the email address in accordance with our
                        <a href="{{ route('privacy-policy') }}">Privacy Policy</a>.
                    </p>
                    <p>
                        {{ config('app.name') }} may permanently or temporarily terminate, suspend, or otherwise refuse to permit your access to the Service without notice and liability for any reason, including if in {{ config('app.name') }}' sole determination you violate any provision of this Agreement, or for no reason. Upon termination for any reason or no reason, you continue to be bound by this Agreement.
                    </p>
                    <p>
                        The Service is subject to scheduled and unscheduled service interruptions. All aspects of the Service are subject to change or elimination at {{ config('app.name') }}‘s sole discretion. You agree that {{ config('app.name') }} will not be liable to you for any interruption of the Service, delay or failure to perform.
                    </p>
                    <p>
                        You are solely responsible for your interactions with other {{ config('app.name') }} Users. We reserve the right, but have no obligation, to monitor disputes between you and other Users. Goodreads shall have no liability for your interactions with other Users, or for any User’s action or inaction.
                    </p>
                </div>

                <div>
                    <h4 class="font-weight-bold">User Content</h4>
                    <p>
                        Some areas of the Service may allow Users to upload, publish, display, link to or otherwise make
                        available (hereinafter, "post") reviews, comments, questions, highlights, and other information
                        including Users’ names, voices and likenesses ("User Content"). You are solely responsible for
                        your User Content. You agree not to post User Content that is illegal, obscene, threatening,
                        defamatory, invasive of privacy, infringing of intellectual property rights
                        (including publicity rights), or otherwise injurious to third parties or objectionable,
                        and does not consist of or contain software viruses, political campaigning, commercial
                        solicitation, chain letters, mass mailings, or any form of "spam" or unsolicited commercial
                        electronic messages. You may not use a false e-mail address, impersonate any person or entity,
                        or otherwise mislead as to the origin of content. You hereby represent that you are the owner
                        of all the copyright rights with respect to, or that you have the legal right to post, your User
                        Content, and that you have the power to grant the license granted below. {{ config('app.name') }} reserves the
                        right to monitor, reject and/or remove any User Content at any time. For example, {{ config('app.name') }} may,
                        but is not obligated to, reject and/or remove any User Content that {{ config('app.name') }} believes,
                        in its sole discretion,
                        violates these provisions.
                    </p>
                    <p>
                        {{ config('app.name') }} takes no responsibility and assumes no liability for any User Content
                        that you or any other Users or third parties post or send over the Service. You understand and
                        agree that any loss or damage of any kind that occurs as a result of the use of any User Content
                        that you post is solely your responsibility. {{ config('app.name') }} is not responsible for any public display
                        or misuse of your User Content. You understand and acknowledge that you may be exposed to User
                        Content that is inaccurate, offensive, indecent, or objectionable, and you agree that {{ config('app.name') }}
                        shall not be liable for any damages you allege to incur as a result of such User Content.{{ config('app.name') }}  may provide tools for you to
                        remove some User Content, but does not guarantee that all or any User Content will be removable.
                    </p>
                </div>
                <div>
                    <h4 class="font-weight-bold">Eligibility</h4>
                    <p>
                        This Service is intended solely for Users who are thirteen (13) years of age or older, and
                        any registration, use or access to the Service by anyone under 13 is unauthorized, unlicensed,
                        and in violation of this Agreement. If you are under 18 years of age you may use the Service
                        only if you either are an emancipated minor or possess legal parental or guardian consent,
                        and are fully able and competent to enter into the terms, conditions, obligations, affirmations,
                        representations,
                        and warranties set forth in this Agreement, and to abide by and comply with this Agreement.
                    </p>
                </div>
                <div>
                    <p>
                        <strong>No Waiver</strong>. No waiver of any term of this Agreement shall be deemed a further or continuing waiver of such term or any other term, and {{ config('app.name') }}' failure to assert any right or provision under this Agreement shall not constitute a waiver of such right or provision.

                        Please <a href="">contact us</a> with any questions regarding this Agreement.
                    </p>
                </div>
            </div>
        </div>
    </div>
@endsection

