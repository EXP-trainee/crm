<div id="wrap-inner">
	<div id="khach-hang">
		<h3>Thông tin khách hàng</h3>
		<p>
			<span class="info">Khách hàng: </span>
			{{ $data2->last_name }}
		</p>
		<p>
			<span class="info">Email: </span>
			{{-- {{$info['mail']}} --}}
			{{  $data  }}
		</p>
		<p>
			<span class="info">Điện thoại: </span>
			{{ $data2->phone }}
		</p>
	</div>					
		<h3>Sản phẩm mới ra mắt</h3>							
		<table class="table-bordered table-responsive">
			<tr class="bold">
				<td width="30%">Tên sản phẩm</td>
				<td width="25%">Ảnh</td>
				<td width="25%">Giá</td>
				<td width="20%">Số lượng</td>
				<td width="15%">Thành tiền</td>
			</tr>
		</table>
	</div>
	<div id="xac-nhan">
		<br>
		<p align="justify">
			<b>Quý khách có quan tâm đến sản phẩm hãy bấm vào link dưới đây</b><br />
			{{-- link sản phẩm --}}
		</p>
	</div>
</div>