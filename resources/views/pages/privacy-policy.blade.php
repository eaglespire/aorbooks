@extends('layouts.master')
@section('content')
    <div class="row justify-content-center rbto">
        <div class="col-md-12">
            <div class="card card-body">
                <h1 class="font-weight-bolder">Privacy Statement</h1>

                <div>
                    <h4 class="font-weight-bold">What Do We Do With Your Information</h4>
                    <p>
                        When you create a free account with {{ config('app.name') }} ,
                        we collect the personal information you give us such as your name and email address.
                        When you browse our site, we also automatically receive your computer’s internet protocol (IP)
                        address in order to provide us with information that helps us learn about your browser and
                        operating system. Email marketing (if applicable): With your permission,
                        we may send you emails about new products and other updates.
                    </p>
                </div>

                <div>
                    <h4 class="font-weight-bold">Disclosure</h4>
                    <p>
                        We may disclose your personal information if we are required by law to do so or if you violate our Terms of Service.
                    </p>
                </div>
                <div>
                    <h4 class="font-weight-bold">Security</h4>
                    <p>
                        To protect your personal information, we take reasonable precautions and follow industry best practices to make sure it is not inappropriately lost, misused, accessed, disclosed, altered or destroyed. If you provide us with your credit card information, the information is encrypted using secure socket layer technology (SSL) and stored with a AES-256 encryption. Although no method of transmission over the Internet or electronic storage is 100% secure, we follow all PCI-DSS requirements and implement additional generally accepted industry standards.
                    </p>
                </div>
                <div>
                    <h4 class="font-weight-bold">Age of Consent</h4>
                    <p>
                        By using this site, you represent that you are at least the age of majority in your state or province of residence, or that you are the age of majority in your state or province of residence and you have given us your consent to allow any of your minor dependents to use this site.
                    </p>
                </div>
                <div>
                    <h4 class="font-weight-bold">Changes to this Privacy Policy</h4>
                    <p>
                        We reserve the right to modify this privacy policy at any time, so please review it frequently. Changes and clarifications will take effect immediately upon their posting on the website. If we make material changes to this policy, we will notify you here that it has been updated, so that you are aware of what information we collect, how we use it, and under what circumstances, if any, we use and/or disclose it.
                    </p>
                </div>
            </div>
        </div>
    </div>
@endsection

