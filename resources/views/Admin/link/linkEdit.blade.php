@extends('Admin.index')
@section('title','修改友情链接')
@section('content')

	<div class="row">
							<div class="col-xs-8">
								<!-- PAGE CONTENT BEGINS -->

								<form action="/admin/link/{{$res->lid}}" method="post" class="form-horizontal" role="form" enctype="multipart/form-data">

									<div class="space-10"></div>
									

									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> 友情链接标题: </label>

										<div class="col-sm-9">
											<input name="tit" type="text" id="form-field-1" placeholder="Username" class="col-xs-10 col-sm-5" value="{{$res->tit}}" />
										</div>
									</div>

									<div class="space-7"></div>

									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-2"> 友情链接地址: </label>

										<div class="col-sm-9">
											<input name="url" type="text" id="form-field-2" placeholder="Password" class="col-xs-10 col-sm-5" value="{{$res->url}}" />
											<span class="help-inline col-xs-12 col-sm-7">
												<span class="middle">Inline help text</span>
											</span>
										</div>
									</div>

									<div class="space-7"></div>

							
										<div class="col-md-offset-3 col-md-9">
										{{ csrf_field() }}
           								{{ method_field('PUT') }}
											<button class="btn btn-info" type="submit">
												<i class="icon-ok bigger-110"></i>
												提交
											</button>

											&nbsp; &nbsp; &nbsp;
										</div>
									

									<div class="hr hr-24"></div>

								</form>

								

								

								
							</div><!-- /.col -->
						</div><!-- /.row -->

@endsection

@section('js')

<script type="text/javascript">
    
</script>

@endsection