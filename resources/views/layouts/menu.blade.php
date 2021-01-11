<li class="side-menus {{ Request::is('*') ? 'active' : '' }}">
    <a class="nav-link" href="/">
        <i class=" fas fa-building"></i><span>Dashboard</span>
    </a>
</li>
<li class="side-menus {{ Request::is('shopBanners*') ? 'active' : '' }}">
    <a class="nav-link" href="{{ route('shopBanners.index') }}"><i class="fas fa-building"></i><span>Shop Banners</span></a>
</li>

<li class="side-menus {{ Request::is('shopBrands*') ? 'active' : '' }}">
    <a class="nav-link" href="{{ route('shopBrands.index') }}"><i class="fas fa-building"></i><span>Shop Brands</span></a>
</li>

<li class="side-menus {{ Request::is('shopCatalogs*') ? 'active' : '' }}">
    <a class="nav-link" href="{{ route('shopCatalogs.index') }}"><i class="fas fa-building"></i><span>Shop Catalogs</span></a>
</li>

<li class="side-menus {{ Request::is('shopCatalogWare*') ? 'active' : '' }}">
    <a class="nav-link" href="{{ route('shopCatalogWare.index') }}"><i class="fas fa-building"></i><span>Shop Catalog Ware</span></a>
</li>

<li class="side-menus {{ Request::is('shopCategories*') ? 'active' : '' }}">
    <a class="nav-link" href="{{ route('shopCategories.index') }}"><i class="fas fa-building"></i><span>Shop Categories</span></a>
</li>

<li class="side-menus {{ Request::is('shopChannels*') ? 'active' : '' }}">
    <a class="nav-link" href="{{ route('shopChannels.index') }}"><i class="fas fa-building"></i><span>Shop Channels</span></a>
</li>

<li class="side-menus {{ Request::is('shopCoupons*') ? 'active' : '' }}">
    <a class="nav-link" href="{{ route('shopCoupons.index') }}"><i class="fas fa-building"></i><span>Shop Coupons</span></a>
</li>

<li class="side-menus {{ Request::is('shopCouriers*') ? 'active' : '' }}">
    <a class="nav-link" href="{{ route('shopCouriers.index') }}"><i class="fas fa-building"></i><span>Shop Couriers</span></a>
</li>

<li class="side-menus {{ Request::is('shopDelays*') ? 'active' : '' }}">
    <a class="nav-link" href="{{ route('shopDelays.index') }}"><i class="fas fa-building"></i><span>Shop Delays</span></a>
</li>

<li class="side-menus {{ Request::is('shopDelayCauses*') ? 'active' : '' }}">
    <a class="nav-link" href="{{ route('shopDelayCauses.index') }}"><i class="fas fa-building"></i><span>Shop Delay Causes</span></a>
</li>

<li class="side-menus {{ Request::is('shopDiscounts*') ? 'active' : '' }}">
    <a class="nav-link" href="{{ route('shopDiscounts.index') }}"><i class="fas fa-building"></i><span>Shop Discounts</span></a>
</li>

<li class="side-menus {{ Request::is('shopElements*') ? 'active' : '' }}">
    <a class="nav-link" href="{{ route('shopElements.index') }}"><i class="fas fa-building"></i><span>Shop Elements</span></a>
</li>

<li class="side-menus {{ Request::is('shopOffers*') ? 'active' : '' }}">
    <a class="nav-link" href="{{ route('shopOffers.index') }}"><i class="fas fa-building"></i><span>Shop Offers</span></a>
</li>

<li class="side-menus {{ Request::is('shopOptions*') ? 'active' : '' }}">
    <a class="nav-link" href="{{ route('shopOptions.index') }}"><i class="fas fa-building"></i><span>Shop Options</span></a>
</li>

<li class="side-menus {{ Request::is('shopOptionBranches*') ? 'active' : '' }}">
    <a class="nav-link" href="{{ route('shopOptionBranches.index') }}"><i class="fas fa-building"></i><span>Shop Option Branches</span></a>
</li>

<li class="side-menus {{ Request::is('shopOptionTypes*') ? 'active' : '' }}">
    <a class="nav-link" href="{{ route('shopOptionTypes.index') }}"><i class="fas fa-building"></i><span>Shop Option Types</span></a>
</li>

<li class="side-menus {{ Request::is('shopOrders*') ? 'active' : '' }}">
    <a class="nav-link" href="{{ route('shopOrders.index') }}"><i class="fas fa-building"></i><span>Shop Orders</span></a>
</li>

<li class="side-menus {{ Request::is('shopOrderItems*') ? 'active' : '' }}">
    <a class="nav-link" href="{{ route('shopOrderItems.index') }}"><i class="fas fa-building"></i><span>Shop Order Items</span></a>
</li>

<li class="side-menus {{ Request::is('shopOverviews*') ? 'active' : '' }}">
    <a class="nav-link" href="{{ route('shopOverviews.index') }}"><i class="fas fa-building"></i><span>Shop Overviews</span></a>
</li>

<li class="side-menus {{ Request::is('shopPackagings*') ? 'active' : '' }}">
    <a class="nav-link" href="{{ route('shopPackagings.index') }}"><i class="fas fa-building"></i><span>Shop Packagings</span></a>
</li>

<li class="side-menus {{ Request::is('shopPayments*') ? 'active' : '' }}">
    <a class="nav-link" href="{{ route('shopPayments.index') }}"><i class="fas fa-building"></i><span>Shop Payments</span></a>
</li>

<li class="side-menus {{ Request::is('shopProducts*') ? 'active' : '' }}">
    <a class="nav-link" href="{{ route('shopProducts.index') }}"><i class="fas fa-building"></i><span>Shop Products</span></a>
</li>

<li class="side-menus {{ Request::is('shopQuestions*') ? 'active' : '' }}">
    <a class="nav-link" href="{{ route('shopQuestions.index') }}"><i class="fas fa-building"></i><span>Shop Questions</span></a>
</li>

<li class="side-menus {{ Request::is('shopRejectCauses*') ? 'active' : '' }}">
    <a class="nav-link" href="{{ route('shopRejectCauses.index') }}"><i class="fas fa-building"></i><span>Shop Reject Causes</span></a>
</li>

<li class="side-menus {{ Request::is('shopReviews*') ? 'active' : '' }}">
    <a class="nav-link" href="{{ route('shopReviews.index') }}"><i class="fas fa-building"></i><span>Shop Reviews</span></a>
</li>

<li class="side-menus {{ Request::is('shopReviewOptions*') ? 'active' : '' }}">
    <a class="nav-link" href="{{ route('shopReviewOptions.index') }}"><i class="fas fa-building"></i><span>Shop Review Options</span></a>
</li>

<li class="side-menus {{ Request::is('shopShipments*') ? 'active' : '' }}">
    <a class="nav-link" href="{{ route('shopShipments.index') }}"><i class="fas fa-building"></i><span>Shop Shipments</span></a>
</li>

<li class="side-menus {{ Request::is('treeShops*') ? 'active' : '' }}">
    <a class="nav-link" href="{{ route('treeShops.index') }}"><i class="fas fa-building"></i><span>Tree Shops</span></a>
</li>

