@extends('admin_layout')
@section('admin_content')
<h3>Xin chào <?php
					$name = Session::get('admin_name');
					if($name){
						echo $name;
					}
					?> :3 </h3>
@endsection