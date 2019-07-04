<?php
$x = "";
echo ($x ?: 'hello');	
echo ($x ?? 'hello');
	
$x = null;
$x;	

$x = [];
$x = ['a', 'b'];
$x = false;
$x = true;
$x = 1;
$x = 0;
$x = -1;
$x = '1';
$x = '0';
$x = '-1';
$x = 'random';
$x = new stdClass;
?>

<table border="1" cellspacing="0" cellpadding="2">
	<tbody>
		<tr>
			<th>Expression</th>
			<th>echo ($x ?: 'hello')</th>
			<th>echo ($x ?? 'hello')</th>
            <th>dynamic echo($x ?: 'hello')</td>
            <th>dynamci echo($x ?? 'hello')</td>
		</tr>
		
		<tr>
			<td>$x = "";</td>
			<td>'hello'</td>
            <td>""</td>
			<td>
                <?php 
                    $x= "";
                    echo ($x ?: 'hello'); 
                ?>
            </td>
            <td><?php echo ($x ?? 'hello'); ?></td>
		</tr>
		
		<tr>
			<td>$x = null;</td>
			<td>'hello'</td>
            <td>'hello'</td>
			<td>
                <?php 
                    $x= null;
                    echo ($x ?: 'hello'); 
                ?>
            </td>
            <td><?php echo ($x ?? 'hello'); ?></td>
		</tr>
		
		<tr>
			<td>$x;</td>
			<td>'hello'<br/>(and Notice: Undefined variable: x)</td>
            <td>'hello'<br/></td>
			<td>
                <?php 
                    $x;
                    echo ($x ?: 'hello'); 
                ?>
            </td>
            <td><?php echo ($x ?? 'hello'); ?></td>
		</tr>
		
		<tr>
			<td>$x = [];</td>
			<td>'hello'</td>
            <td>[]</td>
			<td>
                <?php 
                    $x= [];
                    echo ($x ?: 'hello'); 
                ?>
            </td>
            <td><?php echo ($x ?? 'hello'); ?></td>
		</tr>
		
		<tr>
			<td>$x = ['a', 'b'];</td>
			<td>['a', 'b']</td>
            <td>['a', 'b']</td>
			<td>
                <?php 
                    $x= ['a', ['b']];
                    echo ($x ?: 'hello'); 
                ?>
            </td>
            <td><?php echo ($x ?? 'hello'); ?></td>
		</tr>
		
		<tr>
			<td>$x = false;</td>
			<td>'hello'</td>
            <td>false</td>
			<td>
                <?php 
                    $x= false;
                    echo ($x ?: 'hello'); 
                ?>
            </td>
            <td><?php echo ($x ?? 'hello'); ?></td>
		</tr>
		
		<tr>
			<td>$x = true;</td>
			<td>true</td>
            <td>true</td>
			<td>
                <?php 
                    $x= true;
                    echo ($x ?: 'hello'); 
                ?>
            </td>
            <td><?php echo ($x ?? 'hello'); ?></td>
		</tr>
		
		<tr>
			<td>$x = 1;</td>
			<td>1</td>
            <td>1</td>
			<td>
                <?php 
                    $x= 1;
                    echo ($x ?: 'hello'); 
                ?>
            </td>
            <td><?php echo ($x ?? 'hello'); ?></td>
		</tr>
		
		<tr>
			<td>$x = 0;</td>
			<td>'hello'</td>
            <td>0</td>
			<td>
                <?php 
                    $x= 0;
                    echo ($x ?: 'hello'); 
                ?>
            </td>
            <td><?php echo ($x ?? 'hello'); ?></td>
		</tr>
		
		<tr>
			<td>$x = -1;</td>
			<td>-1</td>
            <td>-1</td>
			<td>
                <?php 
                    $x= -1;
                    echo ($x ?: 'hello'); 
                ?>
            </td>
            <td><?php echo ($x ?? 'hello'); ?></td>
		</tr>
		
		<tr>
			<td>$x = '1';</td>
			<td>'1'</td>
            <td>'1'</td>
			<td>
                <?php 
                    $x= '1';
                    echo ($x ?: 'hello'); 
                ?>
            </td>
            <td><?php echo ($x ?? 'hello'); ?></td>
		</tr>
		
		<tr>
			<td>$x = '0';</td>
			<td>'hello'</td>
            <td>'0'</td>
			<td>
                <?php 
                    $x= '0';
                    echo ($x ?: 'hello'); 
                ?>
            </td>
            <td><?php echo ($x ?? 'hello'); ?></td>
		</tr>
		
		<tr>
			<td>$x = '-1';</td>
			<td>'-1'</td>
            <td>'-1'</td>
			<td>
                <?php 
                    $x= '-1';
                    echo ($x ?: 'hello'); 
                ?>
            </td>
            <td><?php echo ($x ?? 'hello'); ?></td>
		</tr>
		
		<tr>
			<td>$x = 'random';</td>
			<td>'random'</td>
            <td>'random'</td>
			<td>
                <?php 
                    $x= 'random';
                    echo ($x ?: 'hello'); 
                ?>
            </td>
            <td><?php echo ($x ?? 'hello'); ?></td>
		</tr>
		
		<tr>
			<td>$x = new stdClass;</td>
			<td>object(stdClass)</td>
            <td>object(stdClass)</td>
			<td>
                <?php 
                    $x= new stdClass;
                    echo ($x ?: 'hello'); 
                ?>
            </td>
            <td><?php echo ($x ?? 'hello'); ?></td>
		</tr>
	</tbody>
</table>

