<div id="wrap-inner">
	<div id="khach-hang">
		<h3>Thông tin khách hàng</h3>
		<p>
			<span class="info">Khách hàng: </span>
			{{ $data2->last_name }}
		</p>
		<p>
			<span class="info">Email: </span>
			{{  $data  }}
		</p>
		<p>
			<span class="info">Điện thoại: </span>
			{{ $data2->phone }}
		</p>
	</div>			
	<div>
		<h3>Sản phẩm mới ra mắt</h3>							
		<table class="table">
			<thead>
				<tr>
					<th scope="col">STT</th>
					<th scope="col">Tên sản phẩm</th>
					<th scope="col">Giá tiền</th>
					<th scope="col">Hình ảnh</th>
				</tr>
			</thead>
			<tbody>
				<tr>
					<th scope="row">1</th>
					<td>Tên sản phẩm</td>
					<td>Giá tiền</td>
					<td><img src="" alt=""></td>
				</tr>
			</tbody>
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