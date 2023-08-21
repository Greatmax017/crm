<div class="panel panel-default">
	<ul class="nav nav-pills nav-stacked">
	  <li class="{{ Request::is('admin') ? 'active' : '' }}"><a href="/admin">General</a></li>
	  <li class="{{ Request::is('admin/categories') ? 'active' : '' }}"><a href="/admin/categories">Categories</a></li>
	  <li class="{{ Request::is('admin/users') ? 'active' : '' }}"><a href="/admin/users">Users</a></li>
	  <li class="{{ Request::is('admin/transactions') ? 'active' : '' }}"><a href="/admin/transactions">Transactions</a></li>
	  <li class="{{ Request::is('admin/products') ? 'active' : '' }}"><a href="/admin/products">Products</a></li>
		<li class="{{ Request::is('admin/airtime') ? 'active' : '' }}"><a href="/admin/airtime">Airtime</a></li>
		<li class="{{ Request::is('admin/funding') ? 'active' : '' }}"><a href="/admin/funding">Funding</a></li>
	</ul>
</div>
