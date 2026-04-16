@extends('layouts/default')
{{-- Page title --}}
@section('title')
{{ trans('general.dashboard') }}
@parent
@stop


{{-- Page content --}}
@section('content')

@if ($snipeSettings->dashboard_message!='')
<div class="row">
    <div class="col-md-12">
        <div class="box box-default">
            <div class="box-body">
                {!!  Helper::parseEscapedMarkedown($snipeSettings->dashboard_message)  !!}
            </div>
        </div>
    </div>
</div>
@endif

{{-- ============================================================
     KPI CARDS — modeled after stitch_bootstrap_layout_modernization
     ============================================================ --}}
<div class="row kpi-grid">

    <div class="col-lg-2 col-sm-4 col-xs-6">
        <a href="{{ route('hardware.index') }}" class="kpi-card">
            <div class="kpi-top">
                <div class="kpi-icon kpi-icon-teal">
                    <x-icon type="assets" />
                </div>
            </div>
            <div class="kpi-label">{{ trans('general.assets') }}</div>
            <div class="kpi-value">{{ number_format(\App\Models\Asset::AssetsForShow()->count()) }}</div>
            <div class="kpi-link">{{ trans('general.view_all') }} &rarr;</div>
        </a>
    </div>

    <div class="col-lg-2 col-sm-4 col-xs-6">
        <a href="{{ route('licenses.index') }}" class="kpi-card">
            <div class="kpi-top">
                <div class="kpi-icon kpi-icon-purple">
                    <x-icon type="licenses" />
                </div>
            </div>
            <div class="kpi-label">{{ trans('general.licenses') }}</div>
            <div class="kpi-value">{{ number_format($counts['license']) }}</div>
            <div class="kpi-link">{{ trans('general.view_all') }} &rarr;</div>
        </a>
    </div>

    <div class="col-lg-2 col-sm-4 col-xs-6">
        <a href="{{ route('accessories.index') }}" class="kpi-card">
            <div class="kpi-top">
                <div class="kpi-icon kpi-icon-amber">
                    <x-icon type="accessories" />
                </div>
            </div>
            <div class="kpi-label">{{ trans('general.accessories') }}</div>
            <div class="kpi-value">{{ number_format($counts['accessory']) }}</div>
            <div class="kpi-link">{{ trans('general.view_all') }} &rarr;</div>
        </a>
    </div>

    <div class="col-lg-2 col-sm-4 col-xs-6">
        <a href="{{ route('consumables.index') }}" class="kpi-card">
            <div class="kpi-top">
                <div class="kpi-icon kpi-icon-indigo">
                    <x-icon type="consumables" />
                </div>
            </div>
            <div class="kpi-label">{{ trans('general.consumables') }}</div>
            <div class="kpi-value">{{ number_format($counts['consumable']) }}</div>
            <div class="kpi-link">{{ trans('general.view_all') }} &rarr;</div>
        </a>
    </div>

    <div class="col-lg-2 col-sm-4 col-xs-6">
        <a href="{{ route('components.index') }}" class="kpi-card">
            <div class="kpi-top">
                <div class="kpi-icon kpi-icon-orange">
                    <x-icon type="components" />
                </div>
            </div>
            <div class="kpi-label">{{ trans('general.components') }}</div>
            <div class="kpi-value">{{ number_format($counts['component']) }}</div>
            <div class="kpi-link">{{ trans('general.view_all') }} &rarr;</div>
        </a>
    </div>

    <div class="col-lg-2 col-sm-4 col-xs-6">
        <a href="{{ route('users.index') }}" class="kpi-card">
            <div class="kpi-top">
                <div class="kpi-icon kpi-icon-blue">
                    <x-icon type="users" />
                </div>
            </div>
            <div class="kpi-label">{{ trans('general.people') }}</div>
            <div class="kpi-value">{{ number_format($counts['user']) }}</div>
            <div class="kpi-link">{{ trans('general.view_all') }} &rarr;</div>
        </a>
    </div>

</div>{{-- /kpi-grid --}}


@if ($counts['grand_total'] == 0)

    <div class="row">
        <div class="col-md-12">
            <div class="box box-default">
                <div class="box-header with-border">
                    <h2 class="box-title">{{ trans('general.dashboard_info') }}</h2>
                </div>
                <div class="box-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="progress">
                                <div class="progress-bar progress-bar-warning" role="progressbar" style="width: 60%">
                                    <span class="sr-only">{{ trans('general.60_percent_warning') }}</span>
                                </div>
                            </div>
                            <p><strong>{{ trans('general.dashboard_empty') }}</strong></p>
                        </div>
                    </div>
                    <div class="row" style="margin-top: 16px;">
                        <div class="col-md-2">
                            @can('create', \App\Models\Asset::class)
                            <a class="btn btn-primary" style="width: 100%" href="{{ route('hardware.create') }}">{{ trans('general.new_asset') }}</a>
                            @endcan
                        </div>
                        <div class="col-md-2">
                            @can('create', \App\Models\License::class)
                            <a class="btn btn-info" style="width: 100%" href="{{ route('licenses.create') }}">{{ trans('general.new_license') }}</a>
                            @endcan
                        </div>
                        <div class="col-md-2">
                            @can('create', \App\Models\Accessory::class)
                            <a class="btn btn-warning" style="width: 100%" href="{{ route('accessories.create') }}">{{ trans('general.new_accessory') }}</a>
                            @endcan
                        </div>
                        <div class="col-md-2">
                            @can('create', \App\Models\Consumable::class)
                            <a class="btn btn-success" style="width: 100%" href="{{ route('consumables.create') }}">{{ trans('general.new_consumable') }}</a>
                            @endcan
                        </div>
                        <div class="col-md-2">
                            @can('create', \App\Models\Component::class)
                            <a class="btn btn-default" style="width: 100%" href="{{ route('components.create') }}">{{ trans('general.new_component') }}</a>
                            @endcan
                        </div>
                        <div class="col-md-2">
                            @can('create', \App\Models\User::class)
                            <a class="btn btn-default" style="width: 100%" href="{{ route('users.create') }}">{{ trans('general.new_user') }}</a>
                            @endcan
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@else

{{-- ============================================================
     MAIN GRID: Recent Activity (left) + Chart (right)
     ============================================================ --}}
<div class="row" style="margin-top: 8px;">

    {{-- Recent Activity --}}
    <div class="col-md-8">
        <div class="box box-default">
            <div class="box-header with-border">
                <h2 class="box-title">{{ trans('general.recent_activity') }}</h2>
                <div class="box-tools pull-right">
                    <a href="{{ route('reports.activity') }}" class="btn btn-default btn-sm">
                        {{ trans('general.viewall') }}
                    </a>
                </div>
            </div>
            <div class="box-body no-padding">
                <table
                    data-cookie-id-table="dashActivityReport"
                    data-height="460"
                    data-pagination="false"
                    data-side-pagination="server"
                    data-id-table="dashActivityReport"
                    data-sort-order="desc"
                    data-show-columns="false"
                    data-fixed-number="false"
                    data-fixed-right-number="false"
                    data-sort-name="created_at"
                    id="dashActivityReport"
                    class="table table-striped snipe-table"
                    data-url="{{ route('api.activity.index', ['limit' => 25]) }}">
                    <thead>
                    <tr>
                        <th data-field="icon" data-visible="true" style="width: 40px;" class="hidden-xs" data-formatter="iconFormatter">
                            <span class="sr-only">{{ trans('admin/hardware/table.icon') }}</span>
                        </th>
                        <th class="col-sm-3" data-visible="true" data-field="created_at" data-formatter="dateDisplayFormatter">{{ trans('general.date') }}</th>
                        <th class="col-sm-2" data-visible="true" data-field="admin" data-formatter="usersLinkObjFormatter">{{ trans('general.created_by') }}</th>
                        <th class="col-sm-2" data-visible="true" data-field="action_type">{{ trans('general.action') }}</th>
                        <th class="col-sm-3" data-visible="true" data-field="item" data-formatter="polymorphicItemFormatter">{{ trans('general.item') }}</th>
                        <th class="col-sm-2" data-visible="true" data-field="target" data-formatter="polymorphicItemFormatter">{{ trans('general.target') }}</th>
                    </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>

    {{-- Assets by Status Chart --}}
    <div class="col-md-4">
        <div class="box box-default">
            <div class="box-header with-border">
                <h2 class="box-title">
                    {{ (\App\Models\Setting::getSettings()->dash_chart_type == 'name') ? trans('general.assets_by_status') : trans('general.assets_by_status_type') }}
                </h2>
            </div>
            <div class="box-body">
                <div class="chart-responsive">
                    <canvas id="statusPieChart" height="260"></canvas>
                </div>
            </div>
        </div>
    </div>

</div>{{-- /row --}}


{{-- ============================================================
     SECOND ROW: Locations/Companies + Categories
     ============================================================ --}}
<div class="row">

    <div class="col-md-6">
        @if ((($snipeSettings->scope_locations_fmcs!='1') && ($snipeSettings->full_multiple_companies_support=='1')))
            <div class="box box-default">
                <div class="box-header with-border">
                    <h2 class="box-title">{{ trans('general.companies') }}</h2>
                    <div class="box-tools pull-right">
                        <a href="{{ route('companies.index') }}" class="btn btn-default btn-sm">{{ trans('general.viewall') }}</a>
                    </div>
                </div>
                <div class="box-body no-padding">
                    <table
                        data-cookie-id-table="dashCompanySummary"
                        data-height="360"
                        data-pagination="false"
                        data-side-pagination="server"
                        data-sort-order="desc"
                        data-show-columns="false"
                        data-fixed-number="false"
                        data-fixed-right-number="false"
                        data-sort-field="assets_count"
                        id="dashCompanySummary"
                        class="table table-striped snipe-table"
                        data-url="{{ route('api.companies.index', ['sort' => 'assets_count', 'order' => 'asc']) }}">
                        <thead>
                        <tr>
                            <th class="col-sm-4" data-visible="true" data-field="name" data-formatter="companiesLinkFormatter" data-sortable="true">{{ trans('general.name') }}</th>
                            <th class="col-sm-2" data-visible="true" data-field="users_count" data-sortable="true"><x-icon type="users" /><span class="sr-only">{{ trans('general.people') }}</span></th>
                            <th class="col-sm-2" data-visible="true" data-field="assets_count" data-sortable="true"><x-icon type="assets" /><span class="sr-only">{{ trans('general.asset_count') }}</span></th>
                            <th class="col-sm-2" data-visible="true" data-field="licenses_count" data-sortable="true"><x-icon type="licenses" /><span class="sr-only">{{ trans('general.licenses_count') }}</span></th>
                        </tr>
                        </thead>
                    </table>
                </div>
            </div>
        @else
            <div class="box box-default">
                <div class="box-header with-border">
                    <h2 class="box-title">{{ trans('general.locations') }}</h2>
                    <div class="box-tools pull-right">
                        <a href="{{ route('locations.index') }}" class="btn btn-default btn-sm">{{ trans('general.viewall') }}</a>
                    </div>
                </div>
                <div class="box-body no-padding">
                    <table
                        data-cookie-id-table="dashLocationSummary"
                        data-height="360"
                        data-side-pagination="server"
                        data-pagination="false"
                        data-sort-order="desc"
                        data-fixed-number="false"
                        data-fixed-right-number="false"
                        data-sort-field="assets_count"
                        id="dashLocationSummary"
                        data-show-columns="false"
                        class="table table-striped snipe-table"
                        data-url="{{ route('api.locations.index', ['sort' => 'assets_count', 'order' => 'asc']) }}">
                        <thead>
                        <tr>
                            <th class="col-sm-5" data-visible="true" data-field="name" data-formatter="locationsLinkFormatter" data-sortable="true">{{ trans('general.name') }}</th>
                            <th class="col-sm-2" data-visible="true" data-field="assets_count" data-sortable="true"><x-icon type="assets" /><span class="sr-only">{{ trans('general.asset_count') }}</span></th>
                            <th class="col-sm-2" data-visible="true" data-field="assigned_assets_count" data-sortable="true">{{ trans('general.assigned') }}</th>
                            <th class="col-sm-2" data-visible="true" data-field="users_count" data-sortable="true"><x-icon type="users" /><span class="sr-only">{{ trans('general.people') }}</span></th>
                        </tr>
                        </thead>
                    </table>
                </div>
            </div>
        @endif
    </div>

    <div class="col-md-6">
        <div class="box box-default">
            <div class="box-header with-border">
                <h2 class="box-title">{{ trans('general.asset') }} {{ trans('general.categories') }}</h2>
                <div class="box-tools pull-right">
                    <a href="{{ route('categories.index') }}" class="btn btn-default btn-sm">{{ trans('general.viewall') }}</a>
                </div>
            </div>
            <div class="box-body no-padding">
                <table
                    data-cookie-id-table="dashCategorySummary"
                    data-height="360"
                    data-pagination="false"
                    data-side-pagination="server"
                    data-show-columns="false"
                    data-fixed-number="false"
                    data-fixed-right-number="false"
                    data-sort-order="desc"
                    data-sort-field="assets_count"
                    id="dashCategorySummary"
                    class="table table-striped snipe-table"
                    data-url="{{ route('api.categories.index', ['sort' => 'assets_count', 'order' => 'asc']) }}">
                    <thead>
                    <tr>
                        <th class="col-sm-4" data-visible="true" data-field="name" data-formatter="categoriesLinkFormatter" data-sortable="true">{{ trans('general.name') }}</th>
                        <th class="col-sm-2" data-visible="true" data-field="category_type" data-sortable="true">{{ trans('general.type') }}</th>
                        <th class="col-sm-2" data-visible="true" data-field="assets_count" data-sortable="true"><x-icon type="assets" /><span class="sr-only">{{ trans('general.asset_count') }}</span></th>
                        <th class="col-sm-2" data-visible="true" data-field="licenses_count" data-sortable="true"><x-icon type="licenses" /><span class="sr-only">{{ trans('general.licenses_count') }}</span></th>
                    </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>

</div>{{-- /row --}}

@endif

@stop

@section('moar_scripts')
@include ('partials.bootstrap-table', ['simple_view' => true, 'nopages' => true])
@stop

@push('js')
<script src="{{ url(mix('js/dist/Chart.min.js')) }}"></script>
<script nonce="{{ csrf_token() }}">
    var ctx = document.getElementById("statusPieChart");
    if (ctx) {
        var pieOptions = {
            legend: { position: 'top', responsive: true, maintainAspectRatio: true },
            tooltips: {
                callbacks: {
                    label: function(tooltipItem, data) {
                        var counts = data.datasets[0].data;
                        var total = 0;
                        for (var i in counts) { total += counts[i]; }
                        var prefix = data.labels[tooltipItem.index] || '';
                        return prefix + " " + Math.round(counts[tooltipItem.index] / total * 100) + "%";
                    }
                }
            }
        };
        $.ajax({
            type: 'GET',
            url: '{{ (\App\Models\Setting::getSettings()->dash_chart_type == 'name') ? route('api.statuslabels.assets.byname') : route('api.statuslabels.assets.bytype') }}',
            headers: { "X-Requested-With": 'XMLHttpRequest', "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr('content') },
            dataType: 'json',
            success: function (data) {
                new Chart(ctx, { type: 'pie', data: data, options: pieOptions });
            }
        });
    }
</script>
@endpush
