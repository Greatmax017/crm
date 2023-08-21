<div class="panel panel-default">
	<ul class="nav nav-pills nav-stacked">
	  <li class="<?php echo e(Request::is('admin') ? 'active' : '', false); ?>"><a href="/admin">General</a></li>
	  <li class="<?php echo e(Request::is('admin/categories') ? 'active' : '', false); ?>"><a href="/admin/categories">Categories</a></li>
	  <li class="<?php echo e(Request::is('admin/users') ? 'active' : '', false); ?>"><a href="/admin/users">Users</a></li>
	  <li class="<?php echo e(Request::is('admin/transactions') ? 'active' : '', false); ?>"><a href="/admin/transactions">Transactions</a></li>
	  <li class="<?php echo e(Request::is('admin/deleted') ? 'active' : '', false); ?>"><a href="/admin/deleted">Deleted Users</a></li>
	</ul>
</div>