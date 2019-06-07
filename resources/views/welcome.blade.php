@extends('layouts.app')

@section('content')
{{--
    <div id="app">
        <app-default :title="'{{$title}}'" :catchphase="'{{$catchphase}}'"></app-default>
    </div> --}}
    <main role="main">

        <div class="jumbotron">
            <div class="container">
                <div id="textCarousel" class="carousel slide" data-ride="carousel">
                    <ol class="carousel-indicators" style="margin-bottom:-30px; color:black;">
                        <li data-target="#textCarousel" data-slide-to="0" class="active"></li>
                        <li data-target="#textCarousel" data-slide-to="1"></li>
                        <li data-target="#textCarousel" data-slide-to="2"></li>
                        <li data-target="#textCarousel" data-slide-to="3"></li>
                        <li data-target="#textCarousel" data-slide-to="4"></li>
                        <li data-target="#textCarousel" data-slide-to="5"></li>
                    </ol>
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <h1 class="display-3">Inventory Management</h1>
                            <p>Let us help you measure stock targets, standardize replenishments and other inventory goals. You can uses product serial numbers to track and locate items in your organization. This module is closely integrated with the Purchase module.</p>
                            <p><a class="btn btn-primary btn-lg" href="#" role="button">Learn more &raquo;</a></p>
                        </div>
                        <div class="carousel-item">
                            <h1 class="display-3">Simplified Financials</h1>
                            <p>Manage your capital inflow and outflow with ease. It covers standard Accounting & Finance transactions like expenditures, general ledger, balance sheet, bank reconciliation, tax management and payments. You can also generates financial reports for different departments and business units.</p>
                            <p><a class="btn btn-primary btn-lg" href="#" role="button">Learn more &raquo;</a></p>
                        </div>
                        <div class="carousel-item">
                            <h1 class="display-3">Supply Chain Management</h1>
                            <p>Manage product flow from production to consumer and, occasionally, vice-versa for returns or recalls. A key feature of the SCM module is process automation, which streamlines your entire supply chain and makes it adaptive to sudden market shifts.</p>
                            <p><a class="btn btn-primary btn-lg" href="#" role="button">Learn more &raquo;</a></p>
                        </div>
                        <div class="carousel-item">
                            <h1 class="display-3">Sales & Marketing</h1>
                            <p>Handle sales workflows like sales inquiries, quotations, sales orders and sales invoices with more advanced ERP features like taxation rules and shipping tracker. The Sales and CRM modules work together to speed up the sales cycle and earn the company more profits.</p>
                            <p><a class="btn btn-primary btn-lg" href="#" role="button">Learn more &raquo;</a></p>
                        </div>
                        <div class="carousel-item">
                            <h1 class="display-3">Purchasing</h1>
                            <p>Simplify the processes involved in materials procurement. These include: supplier listings, quotation requests and analysis, purchase orders, Good Receipt Notes and stock updates. As such it functions closely with SCM or Inventory modules.</p>
                            <p><a class="btn btn-primary btn-lg" href="#" role="button">Learn more &raquo;</a></p>
                        </div>
                        <div class="carousel-item">
                            <h1 class="display-3">Reporting</h1>
                            <p>We provide detailed reports that are intuitive, actionable and relevant. With complete traceability, ensuring every error, inconsistency and questionable process can be traced, corrected and prevented. Thus helping you target your business’s weaknesses whilst ensuring stronger performance over time.</p>
                            <p><a class="btn btn-primary btn-lg" href="#" role="button">Learn more &raquo;</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="container">
            <h2 style="text-align:left;"> Our Promise to you. </h2>

            <div class="row">
                <div class="col-md-4">
                    <h2> Simplicity </h2>
                    <p>We promise to keep it extremly simple with access to the information you need just a matter of <strong>3</strong> clicks away. Documentation will also be provided for you to make it super easy to use alongside a World Class Customer Service.</p>
                    <p><a class="btn btn-secondary" href="#" role="button">View details &raquo;</a></p>
                </div>
                <div class="col-md-4">
                    <h2> Integration </h2>
                    <p>We promise to work seamlessly with your existing business applications alongside existing infrastructure, expand its functionalities or, in fact, replace it while ensuring smooth records and files migration.</p>
                    <p><a class="btn btn-secondary" href="#" role="button">View details &raquo;</a></p>
                </div>
                <div class="col-md-4">
                    <h2> Customization </h2>
                    <p>We promise to provide you with a solution with customization tools, localized dashboards and configurable workflows, among others, that allow departments to define their goals and set the ERP based on their parameters.</p>
                    <p><a class="btn btn-secondary" href="#" role="button">View details &raquo;</a></p>
                </div>
            </div>

            <hr>

        </div>

    </main>

@endsection
