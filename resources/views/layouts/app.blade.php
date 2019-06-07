<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">

<head>
    <meta charset="utf-8">
    <meta name="robots" content="all,follow">
    <meta name="keywords" content="SaaS, ERP, SME">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="SAAS ERP for SME's">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no, minimal-ui shrink-to-fit=no">
    <title>{{ config('app.name', 'Welcome to ERP') }}</title>
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    @yield('styles')
    <link href="{{ asset('css/main.css') }}" rel="stylesheet">
</head>

<body>

    <div class="wrapper">

        <nav class="navbar navbar-dark bg-dark fixed-top">
            <a class="navbar-brand" href="{{ url('/') }}">
                <img src="https://cdn.vuetifyjs.com/images/logos/v-alt.svg" height="30px" width="30px" class="d-inline-block align-top" alt="Brand Image" title="Brand Image" />
                {{ config('app.name', ' ') }}
            </a>
            <ul class="nav navbar-nav justify-content-end">
                <li class="nav-item">
                    <button type="button" class="btn btn-info" data-toggle="modal" data-target="#ModalSignup">
                        <span> Sign up </span>
                    </button>
                </li>
            </ul>
        </nav>

        @yield('content')

        <br /><br />
        <footer class="fixed-bottom">
            <div class="container">
                <div>
                    <span class="text-muted"> &copy {{ Carbon\Carbon::now()->year }} ERP.com </span>
                    <a href="#" data-toggle="modal" data-target="#TOUModal"> Terms of Use </a>
                    |
                    <a href="#" data-toggle="modal" data-target="#PPModal"> Privacy Policy </a>
                    |
                    <a href="#" data-toggle="modal" data-target="#SLAModal"> SLA </a>
                    |
                    <a href="#" data-toggle="modal" data-target="#GDPRModal"> GDPR </a>
                </div>
            </div>
        </footer>

        <!-- Signup Modal -->
        <div class="modal fade" id="ModalSignup" tabindex="-1" role="dialog" aria-labelledby="ModalTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header bg-dark">
                        <h5 class="modal-title" style="color:#fff;" id="ModalTitle"> Create an Account </h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="abbreviation"> Official Abbreviation </label>
                            <div class="input-group mb-3">
                                <input id="abbreviation" type="text" class="form-control" placeholder="Official abbreviation" aria-label="Official abbreviation" aria-describedby="addon">
                                <div class="input-group-append">
                                    <span class="input-group-text" id="addon">{{'@'.env('TENANCY_DEFAULT_HOSTNAME')}}</span>
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="email">Email Address</label>
                                <input type="email" class="form-control" id="email" placeholder="Email">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="confirmEmail">Confirm Email</label>
                                <input type="email" class="form-control" id="confirmEmail" placeholder="Confirm Email">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="password">Password</label>
                                <input type="password" class="form-control" id="password" placeholder="Email">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="confirmPassword">Confirm Password</label>
                                <input type="password" class="form-control" id="confirmPassword" placeholder="Confirm Password">
                            </div>
                        </div>
                        <div class="form-group checkbox">
                            <input id="AgreementCheckbox" type="checkbox">
                            <label for="AgreementCheckbox">I agree to the Terms of Use.</label>
                        </div>
                        @include('partials.errors')
                    </div>
                    <div class="modal-footer">
                        <button id="signup" type="button" class="btn btn-primary" disabled> Sign Me Up </button>
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Terms of Use Modal -->
        <div class="modal fade" id="TOUModal" tabindex="-1" role="dialog" aria-labelledby="ModalTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header bg-dark">
                        <h5 class="modal-title" style="color:#fff;" id="ModalTitle"> Terms of Use </h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <section class="section pb0 mb0 mt0">
                            <div class="container">
                                <div class="row columns">
                                    <div class="col-sm-12 col-xs-12">
                                        <div itemprop="description">
                                            <div class="ac-text-content" style="height:400px; overflow:auto;">
                                                <p><strong>Use of this Website and any Information or Materials</strong></p>
                                                <p>Acumatica.com (the “Website”) contains information, content, text, photographs, designs, graphics, images, recordings, advertisements, animation and other materials and effects (collectively, the “Materials”) that are protected by copyrights, trademarks, service marks, trade dress and/or other intellectual or proprietary rights owned by Acumatica, Inc. (“Acumatica”) and/or third parties which have authorized its use by Acumatica. All trademarks and copyrighted information contained on the Website are the property of their respective owners. You may not remove from any electronic or printed copy any copyright, trademark, or other proprietary notice.</p>
                                                <p>This Website and the Materials on this Website are provided for your individual, non-commercial use. Any other use of the Website or the Materials is strictly prohibited, including without limitation, copying, modification, republication, deletion, transmission, public performance, distribution, proxy caching, uploading, posting, reproduction, redistribution or any other dissemination, without the express written permission by Acumatica or the applicable rights holder. The Materials on the Website may not be used by you or other third parties, directly or indirectly, for purposes of marketing, solicitation, telemarketing, e-mailing or direct marketing. You may not decompile, reverse engineer, disassemble, rent, lease, loan, sell, sublicense, or create derivative works from the Website or any of the Material. Nor may you use any network monitoring or discovery software to determine the site architecture, or extract information about usage or users.</p>
                                                <p>Any permitted use of the Website does not extend to using the Website or Materials for any illegal or immoral purpose, or to transmit to or through the Website or to or through any service, any illegal, harmful, threatening, defamatory, discriminatory, obscene, hateful, pornographic or other objectionable material of any kind, or to interfere with, abuse or otherwise violate the legal rights of Acumatica or any third party using the Website or Materials.</p>
                                                <p>By continuing to use this Website, you agree to these Terms of Use and to allow Acumatica and its third-party vendors to collect certain information about your visit to the Website.&nbsp; Please see Acumatica’s Privacy Statement for more information about the information collected.</p>
                                                <p><strong>Automated Activity</strong></p>
                                                <p>You agree not to use any automated script to submit any form or other database entry to this Website. This Website may use robot exclusion methods, which include robots.txt files and HTML meta-tags that expressly allow and/or exclude specified automated programs from accessing certain portions of the Website. Information on the Website may be updated on a real-time basis and is proprietary to Acumatica or is licensed to Acumatica by third parties. You agree that if and to the extent prohibited in the then-current robots.txt file or HTML meta-tags on the Website, you will not use any robot, spider, scraper or other automated means to access the Website for any purpose, including but not limited to performing “offline” searches and mirroring, without Acumatica’s express written permission. Additionally, you agree that you will not: (i) take any action that is likely to impose an unreasonable or disproportionately large load on our infrastructure; (ii) interfere or attempt to interfere with the proper working of the Website or any activities conducted on the Website; (iii) harvest email addresses from the Website for any purpose whatsoever, or (iv) bypass our robot exclusion methods or other measures we may use to prevent or restrict access to the Website.</p>
                                                <p><strong>Linking</strong></p>
                                                <p>Acumatica generally welcomes links to the Website from other reputable websites. You may link freely to the Website <em><u>provided that </u></em>(a) you do not remove or obscure, by framing or otherwise, any portion of the homepage or any other page, (b) you do not, by framing or otherwise create an impression that you own, control or have any rights to any part of the Website, (c) you do not link to any secure page (a secure page is one with an https// prefix), and (d) you agree to discontinue providing links to this Website when requested by Acumatica.</p>
                                                <p><strong>Disclaimer</strong></p>
                                                <p>Acumatica makes efforts to try to assure the accuracy of the information it presents in the portions of the content it authors on the Website. Acumatica cautions, however, that because of the volume, complexity of the material, the ever-changing laws and regulations and court decisions, and significant state by state (and sometimes community to community) differences, and because Acumatica communicates information provided and created by advertisers, consumers, software developers, publishers, marketing agents, resellers, and other third parties, Acumatica may have little or no control over the accuracy of such information. &nbsp;Regardless of any control, Acumatica makes no guarantee or representation as to such information, and is not responsible for the information, including its accuracy, currency, content, quality, copyright compliance or legality, or for any resulting loss or damage.</p>
                                                <p><strong>Intellectual Property</strong></p>
                                                <p>The information contained on this site is protected under the Copyright Laws of the United States and other applicable laws.&nbsp; “Acumatica Trademarks” means all names, marks, brands, logos, designs, trade dress and other designations Acumatica uses in connection with its products or services. You may not remove or alter any Acumatica Trademarks, and you may not incorporate any Acumatica Trademarks into your trademarks, service marks, Internet addresses or domain names, or any other similar designations or intellectual property.&nbsp; Improper use of this Website, including any Acumatica Trademarks, may constitute a violation of federal law and could subject violators to severe civil and potentially criminal sanctions. Acumatica is vigorous in its enforcement of its rights.</p>
                                                <p><strong>No Warranty, No Liability, Indemnification</strong></p>
                                                <p>Acumatica makes no representations regarding the availability and performance of its Website. You hereby acknowledge that any use of the Website and reliance upon any Materials shall be at your sole risk.</p>
                                                <p>THE WEBSITE AND THE MATERIALS ARE PROVIDED BY ACUMATICA ON AN “AS IS” BASIS AND AS AVAILABLE, WITHOUT ANY WARRANTY OR REPRESENTATION OF ANY KIND, WHETHER EXPRESS OR IMPLIED. ACUMATICA EXPRESSLY DISCLAIMS ANY AND ALL WARRANTIES, EXPRESS OR IMPLIED, INCLUDING WITHOUT LIMITATION WARRANTIES OF MERCHANTABILITY, FITNESS FOR A PARTICULAR PURPOSE AND NON-INFRINGEMENT, WITH RESPECT TO THE WEBSITE OR ANY MATERIALS.</p>
                                                <p>IN NO EVENT SHALL ACUMATICA BE LIABLE FOR ANY COMPENSATORY, DIRECT, INDIRECT, INCIDENTAL, CONSEQUENTIAL OR PUNITIVE DAMAGES, LOSS OF DATA, INCOME OR PROFIT, LOSS OF OR DAMAGE TO PROPERTY, OR ANY CLAIMS OF YOU OR OTHER THIRD PARTIES WHATSOEVER WITH RESPECT TO THE WEBSITE OR THE MATERIALS OR SITES LINKED FROM THE WEBSITE OR MATERIALS, REGARDLESS OF THE LEGAL THEORY ON WHICH THE CLAIM IS BASED, INCLUDING, WITHOUT LIMITATION, ANY DAMAGES THAT RESULT FROM ANY MISTAKE, OMISSION, VIRUS, DELAY OR INTERRUPTION IN OPERATION OR SERVICE OR FAILURE OF PERFORMANCE, WHETHER OR NOT RESULTING FROM AN ACT OF GOD, COMMUNICATIONS FAILURE, THEFT OR OTHERWISE. ACUMATICA SHALL NOT BE LIABLE FOR ANY LOSSES OR DAMAGES WHATSOEVER RESULTING FROM ANY FAILURE OF THE INTERNET. Some jurisdictions do not allow the exclusion or limitation of liability of consequential or incidental damages, so the above exclusions may not apply to all users; in such jurisdictions liability is limited to the fullest extent permitted by law.</p>
                                                <p><strong>Miscellaneous</strong></p>
                                                <p>Acumatica reserves the right to revise any or all of the Materials on the Website and/or to modify any Website features, specifications, or materials without notice.</p>
                                                <p>Acumatica reserves the right to investigate complaints or reported violations of the Terms of Use and to take any action it deems appropriate, including but not limited to reporting any suspected unlawful activity to law enforcement officials, regulators, or other third parties and disclosing any information necessary or appropriate to such persons or entities relating to user profiles, e-mail addresses, usage history, posted materials, IP addresses and traffic information.</p>
                                                <p>Acumatica reserves the right to seek all remedies available at law and in equity for violations of these Terms of Use, including but not limited to the right to block access from a particular Internet address to this Website.</p>
                                                <p>These Terms of Use constitute the agreement with respect to your access to and use of the Website, together with any additional terms which you may have expressly accepted by use of other features on the Website.</p>
                                                <p>If any provision of these Terms of Use is unlawful, void or unenforceable, then that provision shall be deemed severable from the remaining provisions and shall not affect their validity and enforceability.</p>
                                                <p class="pb+">The Terms of Use will be governed and construed in accordance with the laws of the State of Washington without giving effect to conflict of laws principles, and you agree that any action you or your successors or assigns may bring against Acumatica related to this Website may only be brought in the state and federal courts situated in the State of Washington.&nbsp; You further agree to submit to personal jurisdiction in such courts should Acumatica initiate action against you related to your use or abuse of this Website, and to pay any and all damages related to your violation of these Terms of Use, and to also pay Acumatica such costs, fees and expenses as it reasonably incurs or expends (including attorney fees and court costs) if and to the extent Acumatica successfully prevails against you for your actions in violation of any of the Terms of Use.</p>
                                            </div>
                                        </div>
                                   </div>
                                </div>
                            </div>
                        </section>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-info" data-dismiss="modal">I agree to the Terms of Use</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Privacy Policy Modal -->
        <div class="modal fade" id="PPModal" tabindex="-1" role="dialog" aria-labelledby="ModalTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header bg-dark">
                        <h5 class="modal-title" style="color:#fff;" id="ModalTitle"> Privacy Policy </h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <section class="section pb0 mb0 mt0">
                            <div class="container">
                                <div class="row columns">
                                    <div class="col-sm-12 col-xs-12">
                                        <div itemprop="description">
                                            <div class="ac-text-content" style="height:400px; overflow:auto;">
                                                <p><b>Last Updated May 22, 2018</b></p>
                                                <p>Your privacy is important to us. To better protect your privacy we provide this notice explaining our online information practices.&nbsp; Please read this privacy statement closely.&nbsp; You accept the terms of this private statement by continuing to use Acumatica’s products and services.</p>
                                                <p><strong>Policy</strong></p>
                                                <p>Acumatica, Inc., a Delaware corporation (“Acumatica”) will never sell, rent, barter, trade, distribute or lease personal information to outside parties unless Acumatica obtains customer permission or disclosure is required by law.</p>
                                                <p><strong>Purpose</strong></p>
                                                <p><strong>&nbsp;</strong>Acumatica uses the information customers provide only to the extent necessary to offer our services to our customers. Acumatica believes in both minimizing the data that is collected and limiting its use and purpose to only that: 1) for which we have been given permission by customers, 2) as necessary to deliver our services, and 3) as we might be required or permitted for legal, compliance or other lawful purposes.</p>
                                                <p>The only individually identifiable information that Acumatica collects about you is that which you choose to share with us in registration, such as your name, billing address, email address, phone, usernames and passwords. This information will be closely protected and used for internal purposes only. Acumatica uses return email addresses to answer the email Acumatica receives. Such addresses are not used for any other purpose and are not shared with outside parties.&nbsp; Acumatica will never willfully release your personal information to any third party unless you direct us to do so or disclosure is required by law.</p>
                                                <p>Acumatica also may collect personal information when you request assistance from our customer support team (e.g., phone number, email address,) and may collect additional information that you choose to share with our customer support team.</p>
                                                <p>Acumatica also collects information to evaluate aggregate site usage. &nbsp;&nbsp;Acumatica may automatically collect certain usage information from customers, such as Internet Protocol (“IP”) addresses, log files, unique device identifiers, pages viewed, browser type, any links you click on to leave or interact with our services and other usage information collected from cookies and other tracking technologies as noted below. For example, we collect IP addresses to track and aggregate non-personal information, such as using IP addresses to monitor the regions from which users navigate to our Services.&nbsp; We also collect IP addresses from users when they log into their Acumatica databases as part of our log-in process and for enhanced identity authentication and authorization security.</p>
                                                <p>Acumatica’s services may change over time and we may introduce new features that may collect new or different types of information.</p>
                                                <p><strong>Cookies</strong></p>
                                                <p>There is a technology called “cookies” which can be used to provide tailored information from a web site. A cookie is an element of data that a web site can send to your browser, which may then be stored on your system. A “cookie” marks and identifies visitors on an Internet site to allow customers to enter customized information and have it available on subsequent visits. Acumatica pages may use cookies so that Acumatica can provide a customer with access to information when a customer returns to Acumatica’ web site.</p>
                                                <p>Although there has been debate over the privacy implications of cookies, it is important for Acumatica customers to know that cookies do not read your hard drive, nor can cookies be used to reveal new information about you that you have not elected to reveal.&nbsp; Acumatica may use cookies to log your activity on the site. Everything Acumatica learns from these logs will be used to enrich our users’ experiences on our site. It will help Acumatica understand what you like and don’t like, so Acumatica can focus its energies more effectively and provide you with better service.&nbsp; Please note that your web browser settings may be adjusted to limit or prohibit this and other websites from placing cookies.</p>
                                                <p><strong>Security</strong></p>
                                                <p>Acumatica is committed to protecting the security of your personal information. We use a variety of security technologies and procedures to help protect your personal information from unauthorized access, use, or disclosure. For example, we store the personal information you provide on computer systems with limited access, which are located in controlled facilities.</p>
                                                <p>If a password is used to help protect your accounts and personal information, it is your responsibility to keep your password confidential. Do not share this information with anyone. If you are sharing a computer with anyone you should always choose to log out before leaving a site or service to protect access to your information from subsequent users.</p>
                                                <p><strong>Connecting or Linking Your Acumatica Database with Third Party Services</strong></p>
                                                <p>We work with other companies or developers who provide products and services that you may choose to sync, link or otherwise connect with your Acumatica database.&nbsp; If you choose to make use of such related products or services, we may exchange that information, including your personal information, information from your database, and information about how you interact with each company’s service or product with one or more third parties.&nbsp; This routine exchange of information is necessary to maintain business operations and to provide the requested services.</p>
                                                <p><strong>Data Retention </strong></p>
                                                <p>In accordance with and as permitted by applicable law and regulations, we will retain your information as long as necessary to serve you, to maintain your account for as long as your account is active, or as otherwise needed to operate our business.&nbsp; Acumatica’s backup policy is set forth on the <a href="https://www.acumatica.com/acumatica-saas-faq/#Backups_1">Acumatica SaaS FAQ page</a>.</p>
                                                <p>When your account expires or becomes disabled, Acumatica may retain the data for up to 30 days before it is permanently removed from all of our systems. We will retain information about our customers as required by applicable regulations and to comply with our legal and reporting obligations, resolve disputes, enforce our agreements, complete any outstanding transactions and for the detection and prevention of fraud.</p>
                                                <p><strong>Your Access Rights</strong></p>
                                                <p>You may access your online account to view your personal contact information and make changes or corrections at any time.</p>
                                                <p>Applicable law may give users certain rights to access personal information about them, and to limit use and disclosure of their personal information.&nbsp; Acumatica is committed to respecting those rights.&nbsp; If you wish to request access, to limit use, or to limit disclosure, please contact us at <a href="mailto:privacy@acumatica.com">privacy@acumatica.com</a> and please provide the name of the Acumatica customer who submitted your personal information to our services.&nbsp; We will refer your requests to that customer, and will support them as needed in responding to your request.</p>
                                                <p><strong>Communications Preferences and Opt-Out</strong></p>
                                                <p>As a result of providing your contact information, Acumatica may market to you, including sending promotional communications and relevant offers. To opt out of receiving marketing related communications from Acumatica, please click on the “opt-out” link in the communication. Please note that if you do opt-out of receiving marketing- related emails from us, we may still use your email address to send you important administrative messages. If you wish for us to completely delete your personal record from our database, email <a href="mailto:privacy@acumatica.com">privacy@acumatica.com</a> and we will delete your contact information. </p>
                                                <p><strong>International Data Transfers</strong></p>
                                                <p>In accordance with and as permitted by applicable law and regulations, we reserve the right to transfer your information, process and store it outside your country of residence to wherever we or our third party service providers operate.<strong>&nbsp;</strong></p>
                                                <p><strong>Changes to This Privacy Statement</strong></p>
                                                <p>We will occasionally update this privacy statement to reflect changes in our services and customer feedback. When we post changes to this Statement, we will revise the “last updated” date at the top of this statement. If there are material changes to this statement or in how Acumatica will use your personal information, we will notify you either by prominently posting a notice of such changes prior to implementing the change or by directly sending you a notification. We encourage you to periodically review this statement to be informed of how Acumatica is protecting your information.</p>
                                                <p><strong>Contacting Us</strong></p>
                                                <p>Acumatica welcomes your comments regarding this privacy statement. If you have questions about this statement or believe that we have not adhered to it, please contact us via email at <a href="mailto:privacy@acumatica.com">privacy@acumatica.com</a> or by mail at:&nbsp; Acumatica Privacy, Acumatica, Inc., 11235 SE 6th Street Suite 140, Bellevue WA, 98004</p>
                                                <p>© 2018 Acumatica, Inc. All rights reserved.</p>
                                                <p class="pb+">Read <a href="/privacy-policy/mobile/">Acumatica Privacy Policy for Mobile Apps</a>.</p>
                                            </div>
                                        </div>
                                   </div>
                                </div>
                            </div>
                        </section>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-info" data-dismiss="modal">Noted</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Service Level Agreement Modal -->
        <div class="modal fade" id="SLAModal" tabindex="-1" role="dialog" aria-labelledby="ModalTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header bg-dark">
                        <h5 class="modal-title" style="color:#fff;" id="ModalTitle"> Service Level Agreement </h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <section class="section pb0 mb0 mt0">
                            <div class="container">
                                <div class="row columns">
                                    <div class="col-sm-12 col-xs-12">
                                        <div itemprop="description">
                                            <div class="ac-text-content" style="height:400px; overflow:auto;">
                                                <p>This Acumatica Service Level Agreement (“SLA”) is a policy governing the use of Acumatica SaaS under the terms of the Acumatica SaaS User Agreement (the ”Acumatica SaaS User Agreement“) between Acumatica Inc. (“Acumatica Inc.”, “us” or “we”) and users of Acumatica SaaS services (“you”). This SLA applies separately to each account using Acumatica. We reserve the right to change the terms of this SLA in accordance with the Acumatica SaaS User Agreement.</p>
                                                <h2 class="pt">Service Commitment</h2>
                                                <p>Acumatica will use commercially reasonable efforts to make Acumatica SaaS service instances available with a Monthly Uptime Percentage (defined below) of at least 99.5% during any month of the year (the “Service Commitment”). In the event Acumatica does not meet the Monthly Uptime Percentage commitment, you will be eligible to receive a Service Credit as described below.</p>
                                                <h2 class="pt">Definitions</h2>
                                                <p><strong>“Monthly Uptime Percentage”</strong> for a given service instance is calculated by subtracting from 100% the percentage of 1 minute periods during the month in which the service instance was “Unavailable”, based on the total time in the month. Your service instance is assumed to be 100% available for the any portion of the month in which your subscription is not yet activated. Monthly Uptime Percentage measurements exclude downtime resulting directly or indirectly from any Acumatica SLA Exclusion (defined below).</p>
                                                <p><strong>“Service instance”</strong> means an Acumatica SaaS service instance.</p>
                                                <p><strong>“Unavailable”</strong> means that all connection requests to the running service instance fail during a 1 minute period.</p>
                                                <p><strong>A “Service Credit”</strong> is a dollar credit, calculated as set forth below, that we may credit to an eligible account.</p>
                                                <h2 class="pt">Service Credits</h2>
                                                <p>Service Credits are calculated as a percentage of the value of the service for the month, based on current list price, in which Acumatica SaaS did not meet the Monthly Uptime Percentage commitment.</p>
                                                <table cellspacing="15">
                                                <tbody>
                                                <tr>
                                                <th style="text-align: left;">Monthly Uptime Percentage</th>
                                                <th style="text-align: left;">Service Credit Percentage (per month)</th>
                                                </tr>
                                                <tr>
                                                <td style="padding-right: 15px;">Less than 99.5% but equal to or greater than 99.0%</td>
                                                <td>10%</td>
                                                </tr>
                                                <tr>
                                                <td>Less than 99.0%</td>
                                                <td>20%</td>
                                                </tr>
                                                </tbody>
                                                </table>
                                                <p class="pt">Service Credits will not entitle you to any refund or other payment you may owe to Acumatica or an Acumatica provider. A Service Credit will be applicable and issued only if the credit amount is greater than one dollar ($1 USD).</p>
                                                <h2 class="pt">Credit Request and Payment Procedures</h2>
                                                <p>To receive a Service Credit, you will need to submit a claim by sending an email to <a href="mailto:sla@acumatica.com?subject=Credit%20Request"> sla@acumatica.com</a>.</p>
                                                <p>To be eligible, the credit request must be received by us within 30 days of the occurrence of the incident and must include:</p>
                                                <ul class="simple-ul">
                                                <li>The words “SLA Credit Request” in the subject line</li>
                                                <li>The dates and times of each Unavailability incident you are claiming</li>
                                                <li>The Acumatica URL of the affected service instances</li>
                                                <li>Your request logs or screen shots that document the errors and corroborate your claimed outage (any confidential or sensitive information in these logs should be removed or replaced with asterisks).</li>
                                                </ul>
                                                <p>If the Monthly Uptime Percentage of such request is confirmed by us and is less than the Service Commitment, then we will issue the Service Credit to you within 90 days of approval. Your failure to provide the request and other information as required above will disqualify you from receiving a Service Credit.</p>
                                                <h2 class="pt">Acumatica SLA Exclusions</h2>
                                                <p>The Service Commitment does not apply to any unavailability, suspension or termination of Acumatica, or any other Acumatica performance issues:</p>
                                                <ul class="simple-ul">
                                                <li>That result from a suspension described in Section 13 of the Acumatica SaaS User Agreement</li>
                                                <li>Caused by factors outside of our reasonable control, including any force majeure event or Internet access or related problems beyond the demarcation point of Acumatica and its providers</li>
                                                <li>That result from any voluntary actions or inactions from you or any third party (e.g., snapshot restores, customization publishing, not scaling storage when the storage is close to full, misconfiguring security groups, VPC configurations or credential settings, etc.)</li>
                                                <li>That result from you not following the guidelines described in the Acumatica User Guide</li>
                                                <li>That result in long recovery time due to insufficient resource capacity purchased for your database workload</li>
                                                <li>That result from your equipment, software or other technology and/or third party equipment, software or other technology (other than third party equipment within our direct control); or</li>
                                                <li>That result from any regularly scheduled maintenance as provided for pursuant to the Acumatica SaaS User Agreement; or</li>
                                                <li>Arising from our suspension and termination of your right to use Acumatica in accordance with the Acumatica SaaS User Agreement (collectively, the “Acumatica SLA Exclusions”).</li>
                                                </ul>
                                                <p class="pb+">If availability is impacted by factors other than those explicitly used in our Monthly Uptime Percentage calculation, then we may issue a Service Credit considering such factors at our discretion.</p>
                                                </div>
                                        </div>
                                   </div>
                                </div>
                            </div>
                        </section>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-info" data-dismiss="modal">Noted.</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- General Data Protection Regulation Modal -->
        <div class="modal fade" id="GDPRModal" tabindex="-1" role="dialog" aria-labelledby="ModalTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header bg-dark">
                        <h5 class="modal-title" style="color:#fff;" id="ModalTitle"> General Data Protection Regulation <strong>GDPR</strong> </h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <section class="section pb0 mb0 mt0">
                            <div class="container">
                                <div class="row columns">
                                    <div class="col-sm-12 col-xs-12">
                                        <div class="ac-text-content">
                                            <p>Passed in 2016, the new&nbsp;<a href="http://eur-lex.europa.eu/legal-content/EN/TXT/?uri=uriserv:OJ.L_.2016.119.01.0001.01.ENG&amp;toc=OJ:L:2016:119:TOC" target="_blank">General Data Protection Regulation</a>&nbsp;(GDPR) is the most significant legislative change in European data protection laws since the EU Data Protection Directive (<a href="https://en.wikipedia.org/wiki/Data_Protection_Directive" target="_blank">Directive 95/46/EC</a>), introduced in 1995. Effective May 25, 2018, the GDPR seeks to strengthen the security and protection of personal data in the EU and serve as a single piece of legislation for all of the EU. It will replace the EU Data Protection Directive and all the local laws relating to it.</p>
                                            <p>This new regulation broadly affects all organizations, government agencies, and companies throughout the world that collect or use personal data tied to EU residents.&nbsp;It affects European and non-European businesses using online advertising and measurement solutions when their sites and apps are accessed by users in the European Economic Area (<a href="http://www.efta.int/eea" target="_blank">EEA</a>).&nbsp;Not only is the GDPR an important step in protecting the fundamental right of privacy for European citizens, it also raises the bar for data protection, security and compliance in the industry.</p>
                                            <p>We support and comply with the GDPR.</p>
                                        </div>
                                        <br />
                                        <div itemprop="description" style="height:400px; overflow:auto;">
                                            <h2 class="section__hl section__hl_text_c section__hl_fz_sm mt+ mb">Key GDPR Requirements for SaaS Customers</h2>
                                            <p>As the new GDPR requirements become a reality, organizations using cloud applications worldwide should be aware of their data privacy and security needs relating to their collection and handling of personal information. Here are four key requirements we are highlighting:</p>

                                            <ul class="list-flex list-fill mt">
                                                <li class="list-flex__item list-fill__item list-fill__item_bg_violet list-fill__item_mg4">
                                                    <p class="list-bd__title">Data Security</p>
                                                    <i class="icon icon-secure_info" style="font-size: 48px; margin-top: -10px; margin-bottom: 20px;"></i>
                                                    <p>Organizations must implement an appropriate level of security—encompassing both technical and organizational security controls—to prevent data loss, information leaks, or other unauthorized data processing operations. GDPR encourages companies to incorporate encryption, incident management, network and system integrity, and availability and resilience requirements into their security program.</p>
                                                </li>
                                                <li class="list-flex__item list-fill__item list-fill__item_bg_violet list-fill__item_mg4">
                                                    <p class="list-bd__title">Extended Rights of Individuals</p>
                                                    <i class="icon icon-handshake" style="font-size: 42px; margin-top: -20px; margin-bottom: 32px;"></i>
                                                    <p>Individuals have greater control—and ultimately greater ownership of—their own data. They also have an extended set of data protection rights, including the right to data portability and the right to be forgotten.</p>
                                                </li>
                                                <li class="list-flex__item list-fill__item list-fill__item_bg_violet list-fill__item_mg4">
                                                    <p class="list-bd__title">Documentation and Security Audits</p>
                                                    <i class="icon icon-data_sheet" style="font-size: 48px; margin-top: 0; margin-bottom: 0;"></i>
                                                    <p>Organizations will be expected to: document and maintain records of their security practices, audit the effectiveness of their security programs, and take corrective measures, where appropriate.</p>
                                                </li>
                                                <li class="list-flex__item list-fill__item list-fill__item_bg_violet list-fill__item_mg4">
                                                    <p class="list-bd__title">Data Breach Notification</p>
                                                    <i class="icon icon-announcement" style="font-size: 48px; margin-top: -16px; margin-bottom: 20px;"></i>
                                                    <p>The GDPR has specific requirements about when and how cloud customers have to announce a personal data breach to their regulators and/or impacted individuals.</p>
                                                </li>
                                            </ul>
                                        </div>
                                        <br />
                                        <div class="ac-text-content">
                                            <h2>What is Acumatica doing to comply with GDPR?</h2>
                                            <p>We’ve updated our policies and provided an overview for your information. <a href="/media/2018/05/Acumatica-Information-Security.pdf#page=1&amp;view=FitH,0&amp;zoom=95,0,0&amp;toolbar=1&amp;navpanes=0" class="" data-popup="pdf" data-caption="Acumatica Information Security" data-fancybox-download-url="/media/2018/05/Acumatica-Information-Security.pdf" data-fancybox-download-cta="Download PDF">View Acumatica Information Security</a>
                                            </p>
                                            <h2>Personal Data</h2>
                                            <p>You can make choices about how Acumatica collects and uses your data. You can control your personal data Acumatica has obtained and exercise your data protection rights by contacting Acumatica or using various tools that we provide. </p>
                                            <p>To opt-out of receiving marketing related communications from Acumatica, please click on the “opt-out” link in the communications you receive. Please note that if you do opt-out of receiving marketing related emails from us, we may still use your contact information to send you important administration messages, such as billing and support. If you wish for us to completely delete your personal record from our database, email <a href="mailto:privacy@acumatica.com">privacy@acumatica.com</a> and we will remove it.</p>
                                        </div>
                                   </div>
                                </div>
                            </div>
                        </section>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-info" data-dismiss="modal">Noted.</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- <script src="{{ asset('js/app.js') }}"></script> --}}
    <script src="{{ asset('js/jquery.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>

    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/es6-promise@4/dist/es6-promise.auto.js"></script>
    <script>
        $(document).ready(function()
        {
            function validateEmail(userinput)
            {
                var pattern = /^\b[A-Z0-9._%-]+@[A-Z0-9.-]+\.[A-Z]{2,4}\b$/i;
                return (!pattern.test(userinput) ? false : true);
            }

            $('#abbreviation').blur(event => {
                // Check if the name is available or taken.
                var abbr = $('#abbreviation').val();

                if ($.trim(abbr))
                {
                    fetch("api/tenant/isavailable/" + abbr)
                        .then(data => {
                            return data.json();
                        })
                        .then(res => {
                            if (res.status.toLowerCase() === 'success')
                            {
                                $('#signup').removeAttr('disabled');
                                $('#abbreviation').css('background-color', 'white');
                            } else {
                                $('#signup').attr('disabled', 'disabled');
                                $('#abbreviation').css('background-color', 'red');
                            }
                        })
                } else {
                    $('#abbreviation').focus();
                }
            });

            $('#signup').click(event => {
                const signupObject = {
                    email: $('#email').val(),
                    password: $('#password').val(),
                    abbreviation: $('#abbreviation').val(),
                    confirmEmail: $('#confirmEmail').val(),
                    confirmPassword: $('#confirmPassword').val(),
                    TOSAgreement: $('#AgreementCheckbox').is(":checked")
                };

                // Validations
                var ErrorDetails = '<ol>';
                if (!validateEmail(signupObject.email)) {
                    ErrorDetails += '<li> Invalid Email Supplied. </li>';
                }

                if (signupObject.email !== signupObject.confirmEmail) {
                    ErrorDetails += '<li> Emails do not match. </li>';
                }

                if (signupObject.password === "") {
                    ErrorDetails += '<li> Please enter a valid password. </li>';
                }

                if (signupObject.password !== signupObject.confirmPassword) {
                    ErrorDetails += '<li> Passwords do not match. </li>';
                }

                if (signupObject.TOSAgreement === false) {
                    ErrorDetails += '<li> You are yet to agree to our Terms of Use. </li>';
                }
                ErrorDetails += '</ol>';

                if (ErrorDetails !== '<ol></ol>') {
                    ShowErrors(ErrorDetails);
                } else {
                    // Disable the Sign up button
                    $('#signup').attr('disabled', 'disabled');

                    // Send the Data to create the Tenant and redirect to the tenant URL.
                    fetch('api/tenant/register',
                    {
                        method: 'POST',
                        body: JSON.stringify(signupObject),
                        headers: {
                            'Content-Type': 'application/json'
                        }
                    })
                    .then(data => {
                        return data.json();
                    })
                    .then(response => {
                        if (response.status.toLowerCase() === 'success')
                        {
                            window.location.href = response.url;
                        }
                    })
                    .catch(error => {
                        ShowErrors(error);
                    });
                }
            });
        });
    </script>
    @yield('scripts')

</body>

</html>
