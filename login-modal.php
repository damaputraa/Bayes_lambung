<!-- Trigger the modal with a button -->
<div class="work_bottom"><a class="contact_btn" data-toggle="modal" data-target="#myModal">LOGIN</a> </div>   

  <!-- Modal -->
<div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog modal-sm">
      <div class="modal-content">
        <div class="modal-header" style="background:#3a943d;">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Anda harus login</h4>
        </div>
		<form method="POST" action="user-login.php">
			<div class="modal-body">
				<table class="table">
					<tbody>
						<tr style="background:#fff;">
							<td>User</td>
							<td><input type="text" name="text_name"/></td>
						</tr>
						<tr>
							<td>Pass</td>
							<td><input type="password" name="pass"/></td>
						</tr>
					</tbody>
				</table>
			</div>
			<div class="modal-footer">
				<button type="submit" class="btn btn-success" value="Submit">Login</button>
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
			</div>
		</form>
      </div>
    </div>
 </div>