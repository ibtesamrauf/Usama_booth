@extends('layouts.app')
@section('content')

<?php 
	// v(Cart::instance('shopping')->content());
?>

	<?php foreach(Cart::instance('shopping')->content() as $row) :?>

		<tr>
			<td>
				<p><strong><?php echo $row->name; ?></strong></p>
				<p><?php echo ($row->options->has('size') ? $row->options->size : ''); ?></p>
			</td>
			<td><input type="text" value="<?php echo $row->qty; ?>"></td>
			<td>$<?php echo $row->price; ?></td>
			<td>$<?php echo $row->total; ?></td>
		</tr>

	<?php endforeach;
	echo "<br><br>";
	echo "Total: ".Cart::instance('shopping')->total();
	?>
	<br><br>

@endsection