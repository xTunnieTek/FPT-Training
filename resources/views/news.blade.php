@include('Layouts.defaultLayout')
@include('Layouts.sidebar')
@include('Layouts.navbar')

<div class="container-fluid py-4">
    <div class="row">
        <div class="col-6">
            <a class="twitter-timeline" data-lang="en" data-width="700" data-height="800" data-dnt="true" data-theme="light" href="https://twitter.com/fpt_software?ref_src=twsrc%5Etfw">Tweets by fpt_software</a> <script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>
        </div>
        <div class="col-6">
            <iframe src="https://www.facebook.com/plugins/post.php?href=https%3A%2F%2Fwww.facebook.com%2FFPTSoftware.tuyendung%2Fposts%2Fpfbid0TfgTG1Hz6CDK3Qack35S4HKm3G9tCmfawoqH1cKynaxxGbrEiSXjYysH2MC1pmrpl&show_text=true&width=500" width="700" height="800" style="border:none;overflow:hidden; border-radius:5px;" scrolling="no" frameborder="0" allowfullscreen="true" allow="autoplay; clipboard-write; encrypted-media; picture-in-picture; web-share"></iframe>
        </div>
        @include('Layouts.footer')
    </div>
</div>
@include('Layouts.endLayout')
