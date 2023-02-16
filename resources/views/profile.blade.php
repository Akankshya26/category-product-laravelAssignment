<link rel="stylesheet" type="text/css" href="{{ asset('css/profile.css') }}">
<div class="container">
    <div class="card">
        <div class="card-header">

        </div>
        <div class="card-body">
            <div class="inner">

                <div style="font-size: 18px;letter-spacing: .5px;margin-bottom: 10px;">{{ Auth()->user()->name }}
                </div>
                <div class="color__gray" style="font-size: 13px;letter-spacing: .5px;">{{ Auth()->user()->address }}
                </div>
            </div>
        </div>
        <div class="card-footer">
            <div class="inner">
                <div>{{ Auth()->user()->phone }}</div>
                <div class="color__gray">Contact</div>
            </div>
            <div class="inner">
                <div>{{ Auth()->user()->email }}</div>
                <div class="color__gray">email</div>
            </div>

        </div>
    </div>
</div>
