<div class="main-sidebar">
	<aside id="sidebar-wrapper">
		<div class="sidebar-brand">
			<a href="{{ route('home') }}"><img src="{{ asset('dist/assets/img/ikealogo.png') }}" alt="logo" width="240" ></a>
		</div>
		<br><br>
		<ul class="sidebar-menu">
			<li class="menu-header">Dashboard</li>
			<li class="@if ($title == 'Home Dashboard') active @endif">
				<a class="nav-link" href="{{ route('home') }}">
					<i class="fas fa-home"></i><span>Home</span>
				</a>
			</li>
			<li class="menu-header">Dashboard</li>
			<li class="@if ($title == 'Stock') active @endif">
				<a class="nav-link" href="{{ route('stocks.show') }}">
					<i class="fas fa-address-book"></i><span>Stock</span>
				</a>
			</li>
		</ul>
	
	</aside>
</div>