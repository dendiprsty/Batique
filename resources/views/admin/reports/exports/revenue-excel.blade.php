<table>
	<thead>
		<tr>
			<th>Tanggal</th>
			<th>Pesanan</th>
			<th>Pajak</th>
			<th>Biaya Pengiriman</th>
			<th>Laba Kotor</th>
			<th>Laba Bersih</th>
		</tr>
	</thead>
	<tbody>
		@php
		$totalOrders = 0;
		$totalGrossRevenue = 0;
		$totalTaxesAmount = 0;
		$totalShippingAmount = 0;
		$totalNetRevenue = 0;
		@endphp
		@foreach ($revenues as $revenue)
		<tr>
			<td>{{ $revenue->date }}</td>
			<td>{{ $revenue->num_of_orders }}</td>
			<td>{{ $revenue->taxes_amount }}</td>
			<td>{{ $revenue->shipping_amount }}</td>
			<td>{{ $revenue->gross_revenue }}</td>
			<td>{{ $revenue->net_revenue }}</td>
		</tr>

		@php
		$totalOrders += $revenue->num_of_orders;
		$totalGrossRevenue += $revenue->gross_revenue;
		$totalTaxesAmount += $revenue->taxes_amount;
		$totalShippingAmount += $revenue->shipping_amount;
		$totalNetRevenue += $revenue->net_revenue;
		@endphp
		@endforeach

		<tr>
			<td>Total</td>
			<td><strong>{{ $totalOrders }}</strong></td>
			<td><strong>{{ $totalGrossRevenue }}</strong></td>
			<td><strong>{{ $totalTaxesAmount }}</strong></td>
			<td><strong>{{ $totalShippingAmount }}</strong></td>
			<td><strong>{{ $totalNetRevenue }}</strong></td>
		</tr>
	</tbody>
</table>