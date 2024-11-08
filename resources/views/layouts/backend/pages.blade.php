

<li>
    <a href="javascript: void(0);" class="has-arrow waves-effect">
        <img src="{{ asset('backend/images/icon/career.png') }}" class="property_icon" alt="">
        <span key="t-dashboards">Category</span>
    </a>
    <ul class="sub-menu" aria-expanded="false">
        <li><a href="{{ route('backend.category.index') }}" key="t-tui-calendar">All Category</a></li>
    </ul>
</li>
<li>
    <a href="javascript: void(0);" class="has-arrow waves-effect">
        <img src="{{ asset('backend/images/icon/category.png') }}" class="property_icon" alt="">
        <span key="t-dashboards">Sub Category</span>
    </a>
    <ul class="sub-menu" aria-expanded="false">
        <li><a href="{{ route('backend.subcategory.index') }}" key="t-tui-calendar">All Subcategory</a></li>
    </ul>
</li>
<li>
    <a href="javascript: void(0);" class="has-arrow waves-effect">
        <img src="{{ asset('backend/images/icon/portfolio.png') }}" class="property_icon" alt="">
        <span key="t-dashboards">Product</span>
    </a>
    <ul class="sub-menu" aria-expanded="false">
        <li><a href="{{ route('backend.product.create') }}" key="t-tui-calendar">Create</a></li>
        <li><a href="{{ route('backend.product.index') }}" key="t-tui-calendar">All Products</a></li>
    </ul>
</li>
<li>
    <a href="javascript: void(0);" class="has-arrow waves-effect">
        <img src="{{ asset('backend/images/icon/portfolio.png') }}" class="property_icon" alt="">
        <span key="t-dashboards">Role Permission</span>
    </a>
    <ul class="sub-menu" aria-expanded="false">
        <li><a href="{{ route('backend.roles.create') }}" key="t-tui-calendar">Create</a></li>
        <li><a href="{{ route('backend.roles.index') }}" key="t-tui-calendar">All Role</a></li>
    </ul>
</li>
