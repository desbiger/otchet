<div class = "gantt"></div>


<!--<script type = "text/javascript">-->
<!--	$(function () {-->
<!--		$('.gantt').gantt({-->
<!--			source: [-->
<!--				--><?//$i = 0?>
<!--				--><?// foreach ($tasks as $k => $t): ?>
<!--				--><?//
//				$times = ORM::factory('WorkTimes')
//						->where('task_id', '=', $t->id)
//						->order_by('date')
//						->find_all();?>
<!---->
<!--				--><?// if ($times->count()): ?>
<!---->
<!--				--><?//foreach($times as $k => $time):?>
<!--				--><?//$i++;?>
<!--				--><?//if($i > 1):?>
<!--				,-->
<!--				--><?//endif?>
<!--				{-->
<!--					name: "--><?//=$k == 0 ? str_replace("\"","'",$t->name): ""?><!--",-->
<!--					desc: "--><?//=str_replace("\"","'",$time->text)?><!--",-->
<!--					values: [-->
<!--						{-->
<!--							from: "--><?//=$time->date." ".$time->time_begin?><!--",-->
<!--							to: "--><?//=$time->date." ".$time->time_end?><!--",-->
<!--							label: "--><?//=str_replace("\"","'",$time->text)?><!--",-->
<!--							customClass: "ganttRed"-->
<!--						}-->
<!--					]-->
<!--				}-->
<!--				--><?//file_put_contents(DOCROOT."/log.log",date("Y-d-m H:g:s",strtotime($time->date." ".$time->time_begin)));?>
<!--				--><?//endforeach?>
<!--				--><?// endif ?>
<!---->
<!--				--><?//endforeach ?>
<!---->
<!--			],-->
<!--			initZoom: -2,-->
<!--			scale: "days",-->
<!--			navigate: "scroll",-->
<!--			maxScale: "hours",-->
<!--			itemsPerPage: 100,-->
<!--			onItemClick: function (data) {-->
<!--				alert("Item clicked - show some details");-->
<!--			},-->
<!--			onAddClick: function (dt, rowId) {-->
<!--				alert("Empty space clicked - add an item!");-->
<!--			},-->
<!--			onRender: function () {-->
<!--				if (window.console && typeof console.log === "function") {-->
<!--					console.log("chart rendered");-->
<!--				}-->
<!--			}-->
<!--		});-->
<!---->
<!--		$(".gantt").popover({-->
<!--			selector: ".bar",-->
<!--			title: "I'm a popover",-->
<!--			content: "And I'm the content of said popover.",-->
<!--			trigger: "hover"-->
<!--		});-->
<!---->
<!--		prettyPrint();-->
<!---->
<!--	});-->
<!--</script>-->

