@extends('backend/layouts/default')

{{-- Page title --}}
@section('title')
Schemes ::
@parent
@stop

@section('map-content')

        <!-- Mapping -->
<link rel="stylesheet" href="../../assets/css/mapping/leaflet.css" />
<link rel="stylesheet" href="../../assets/css/mapping/leafletmap.css" />
<link rel="stylesheet" href="../../assets/css/mapping/Leaflet.NavBar.css" />
<link rel="stylesheet" href="../../assets/css/mapping/styledLayerControl.css" />
<link rel="stylesheet" href="../../assets/css/mapping/leaflet.label.css" />

<!-- Load Leaflet from CDN-->
<script src="../../assets/js/mapping/leaflet.js"></script>
<script src="http://maps.google.com/maps/api/js?v=3.2&sensor=false"></script>
<script src="../../assets/js/mapping/Leaflet.NavBar.js" type="text/javascript"></script>
<script src="../../assets/js/mapping/styledLayerControl.js"></script>
<script src="../../assets/js/mapping/leaflet-google.js" type="text/javascript"></script>
<script src="../../assets/js/mapping/leaflet.label.js"></script>
<!-- Load Esri Leaflet from CDN -->
<script src="../../assets/js/mapping/esri-leaflet.js"></script>
<!-- Mapping END -->


<div id="map" style="height: 500px">
    <script src="../../assets/js/mapping/map_deployed.js" type="text/javascript"></script>
</div>

@stop
{{-- Page content --}}
@section('content')

<div class="row header">
    <div class="col-md-12">
        {{--<a href="{{ route('create/location') }}" class="btn btn-success pull-right"><i class="fa fa-plus icon-white"></i>  @lang('general.create')</a>--}}
        <h3>Saafpani Schemes</h3>
    </div>
</div>

<div class="row form-wrapper">

    <table
    name="categories"
    id="table"
    data-url="{{ route('api.locations.list') }}"
    data-cookie="true"
    data-click-to-select="true"
    data-cookie-id-table="locationsTable-{{ Config::get('version.hash_version') }}">
        <thead>
            <tr>
                <th data-sortable="true" data-field="id" data-visible="false">@lang('general.id')</th>
                <th data-sortable="true" data-field="name">@lang('admin/locations/table.name')</th>
                <th data-searchable="true" data-sortable="false" data-field="scheme_code">SCHEME CODE</th>
                {{--<th data-sortable="true" data-field="parent">@lang('admin/locations/table.parent')</th>--}}
                <th data-searchable="false" data-sortable="false" data-field="assets_default">@lang('admin/locations/table.assets_rtd')</th>
                {{--<th data-searchable="false" data-sortable="false" data-field="assets_checkedout">@lang('admin/locations/table.assets_checkedout')</th>--}}
                {{--<th data-searchable="true" data-sortable="true" data-field="currency">{{{ Setting::first()->default_currency }}}</th>--}}
                <th data-searchable="true" data-sortable="true" data-field="address">@lang('admin/locations/table.address')</th>

                {{--<th data-searchable="true" data-sortable="false" data-field="coordinates">COORDINATES</th>--}}

                {{--<th data-searchable="true" data-sortable="false" data-field="navigate">NAVIGATE</th>--}}

                <!-- <th data-searchable="true" data-sortable="false" data-field="longitude">Longitude</th>
                <th data-searchable="true" data-sortable="false" data-field="latitude">Latitude</th> -->

                <th data-searchable="true" data-sortable="true" data-field="city">@lang('admin/locations/table.city')
                </th>
                {{--<th data-searchable="true" data-sortable="true" data-field="state">--}}
                 {{--@lang('admin/locations/table.state')--}}
                {{--</th>--}}
                <th data-searchable="true" data-sortable="true" data-field="country">
                @lang('admin/locations/table.country')</th>
                <th data-switchable="false" data-searchable="false" data-sortable="false" data-field="actions">{{ Lang::get('table.actions') }}</th>
            </tr>

        </thead>
    </table>
</div>

@section('moar_scripts')
<script src="{{ asset('assets/js/bootstrap-table.js') }}"></script>
<script src="{{ asset('assets/js/extensions/cookie/bootstrap-table-cookie.js') }}"></script>
<script src="{{ asset('assets/js/extensions/mobile/bootstrap-table-mobile.js') }}"></script>
<script src="{{ asset('assets/js/extensions/export/bootstrap-table-export.js') }}"></script>
<script src="{{ asset('assets/js/extensions/export/tableExport.js') }}"></script>
<script src="{{ asset('assets/js/extensions/export/jquery.base64.js') }}"></script>
<script type="text/javascript">
    $('#table').bootstrapTable({
        classes: 'table table-responsive table-no-bordered',
        undefinedText: '',
        iconsPrefix: 'fa',
        showRefresh: true,
        search: true,
        pageSize: {{{ Setting::getSettings()->per_page }}},
        pagination: true,
        sidePagination: 'server',
        sortable: true,
        cookie: true,
        cookieExpire: '2y',
        mobileResponsive: true,
        showExport: true,
        showColumns: true,
        exportDataType: 'all',
        exportTypes: ['csv', 'txt','json', 'xml'],
        maintainSelected: true,
        paginationFirstText: "@lang('general.first')",
        paginationLastText: "@lang('general.last')",
        paginationPreText: "@lang('general.previous')",
        paginationNextText: "@lang('general.next')",
        pageList: ['10','25','50','100','150','200'],
        icons: {
            paginationSwitchDown: 'fa-caret-square-o-down',
            paginationSwitchUp: 'fa-caret-square-o-up',
            columns: 'fa-columns',
            refresh: 'fa-refresh'
        },

    });
</script>
@stop

@stop
