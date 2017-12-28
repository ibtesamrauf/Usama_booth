@extends('layouts.app')
@section('content')
		
	<?php
	// vv(Cart::instance('shopping')->content());
	if(!Cart::instance('shopping')->content()->isEmpty()){
	 	foreach(Cart::instance('shopping')->content() as $row) :?>
			
				<tr>
					<td>
						<p><strong><?php echo $row->name; ?></strong></p>
						<p><?php echo ($row->options->has('size') ? $row->options->size : ''); ?></p>
					</td>
					<td>
	                    {!! Form::open(['url' => '/show_cart_view', 'class' => 'form-horizontal', 'files' => true]) !!}

							<input type="hidden" name="cart_product_id" value="<?php echo $row->rowId; ?>"></td>

							<input type="number" name="cart_product_quantity" value="<?php echo $row->qty; ?>"></td>
							{!! $errors->first('product_quantity', '<p class="help-block">:message</p>') !!}
	                        {!! Form::submit(isset($submitButtonText) ? $submitButtonText : 'UPDATE', ['class' => 'btn btn-success']) !!}
	                    {!! Form::close() !!}
					</td>
					<td>
						{!! Form::open([
	                        'method'=>'DELETE',
	                        'url' => ['/show_cart_view', $row->rowId],
	                        'style' => 'display:inline'
	                    ]) !!}
	                        {!! Form::button('<i class="fa fa-trash-o" aria-hidden="true"></i> Delete', array(
	                                'type' => 'submit',
	                                'class' => 'btn btn-danger btn-xs',
	                                'title' => 'Delete',
	                                'onclick'=>'return confirm("Confirm delete?")'
	                        )) !!}
	                    {!! Form::close() !!}
					</td>
					<td>$<?php echo $row->price; ?></td>
					<td>$<?php echo $row->total; ?></td>
				</tr>
			
		<?php endforeach; ?>

		<?php
		echo "<br><br>";
		echo "Total: ".Cart::instance('shopping')->total();
	}else{
		?>
		<h2>Cart is empty</h2>
		<?php
	}
		?>

	<br><br>

@endsection