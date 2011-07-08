{embed="includes/_doc-top" 
	channel="{channel}"
	title="{section}"}
{assign_variable:channel="cart"}
{assign_variable:section="Shopping Cart"}
<div class="body">
	{embed="includes/_breadcrumbs" section="{section}" channel="{channel}"}
	<div class="heading clearafter">
		<h1>{section}</h1>
	</div>
	<div class="grid23 clearafter">
		<div class="single left">
			<table id="cart">
				<thead>
					<tr>
						<td class="product">Product</td>
						<td class="price">Price</td>
						<td class="qty">Qty</td>
						<td class="subtotal">Subtotal</td>
						<td class="delete"></td>
					</tr>
				</thead>
				<tbody>
				{exp:cartthrob:cart_items_info orderby="title" sort="asc"}
					<tr>
						<td class="product">
							{exp:ce_img:pair src="{product_image}" max_width="100" max_height="100" crop="yes" debug="yes"}
								<img src="{made}" alt="{title}" width="{width}" height="{height}" />
							{/exp:ce_img:pair}{title}</td>
						<td class="price">{item_price}</td>
						<td class="qty"><input type="text" name="quantity" class="input" size="2" value="{quantity}" /></td>
						<td class="subtotal">{item_subtotal}</td>
						<td class="delete"><a href="{path='cart/delete-from-cart/{row_id}'}"><span>&times;</span></a></td>
					</tr>
				{/exp:cartthrob:cart_items_info}
				</tbody>
			</table>
		</div>
		<div class="sidebar right">
			<div class="bar">Sidebar</div>
		</div>
	</div>
</div><!-- /.body -->
{embed="includes/_doc_bottom"}