// import colorLib from '@kurkle/color';
// import { DateTime } from 'luxon';
// import 'chartjs-adapter-luxon';
// import { valueOrDefault } from '../../dist/helpers.esm';
// export { Tooltip } from '../../dist/chart.esm';

// <block:actions:2>
// const actions = [
//     {
//         name: 'Randomize',
//         handler(myChart) {
//             myChart.data.datasets.forEach(dataset => {
//                 dataset.data = Utils.numbers({ count: myChart.data.labels.length, min: -100, max: 100 });
//             });
//             myChart.update();
//         }
//     },
//     {
//         name: 'Add Dataset',
//         handler(myChart) {
//             const data = myChart.data;
//             const dsColor = Utils.namedColor(myChart.data.datasets.length);
//             const newDataset = {
//                 label: 'Dataset ' + (data.datasets.length + 1),
//                 backgroundColor: Utils.transparentize(dsColor, 0.5),
//                 borderColor: dsColor,
//                 data: Utils.numbers({ count: data.labels.length, min: -100, max: 100 }),
//             };
//             myChart.data.datasets.push(newDataset);
//             myChart.update();
//         }
//     },
//     {
//         name: 'Add Data',
//         handler(myChart) {
//             const data = myChart.data;
//             if (data.datasets.length > 0) {
//                 data.labels = Utils.months({ count: data.labels.length + 1 });

//                 for (let index = 0; index < data.datasets.length; ++index) {
//                     data.datasets[index].data.push(Utils.rand(-100, 100));
//                 }

//                 myChart.update();
//             }
//         }
//     },
//     {
//         name: 'Remove Dataset',
//         handler(myChart) {
//             myChart.data.datasets.pop();
//             myChart.update();
//         }
//     },
//     {
//         name: 'Remove Data',
//         handler(myChart) {
//             myChart.data.labels.splice(-1, 1); // remove the label first

//             myChart.data.datasets.forEach(dataset => {
//                 dataset.data.pop();
//             });

//             myChart.update();
//         }
//     }
// ];
// // </block:actions>

// <block:setup:1>
// const DATA_COUNT = 7;
// const NUMBER_CFG = { count: DATA_COUNT, min: -100, max: 100 };

// const labels = Utils.months({ count: 7 });
// const data = {
//     labels: labels,
//     datasets: [
//         {
//             label: 'Dataset 1',
//             data: Utils.numbers(NUMBER_CFG),
//             borderColor: Utils.myChart_COLORS.red,
//             backgroundColor: Utils.transparentize(Utils.myChart_COLORS.red, 0.5),
//         },
//         {
//             label: 'Dataset 2',
//             data: Utils.numbers(NUMBER_CFG),
//             borderColor: Utils.myChart_COLORS.blue,
//             backgroundColor: Utils.transparentize(Utils.myChart_COLORS.blue, 0.5),
//         }
//     ]
// };
// </block:setup>

// <block:config:0>
// <block:setup:1>

// </block:config>

// module.exports = {
//     actions: actions,
//     config: config,
// };
var data = {
	labels: [],
	datasets: [
		{
			label: "Viewers",
			backgroundColor: "rgb(169,182,189)",
			borderColor: "rgb(169,182,189)",
			borderWidth: 1,
			borderRadius: 10,
			barPercentage: 0.5,
			hoverBackgroundColor: "rgb(75, 66, 145)"
		},
		{
			label: "Watched",
			backgroundColor: "rgb(169,182,189)",
			borderColor: "rgb(169,182,189)",
			borderWidth: 1,
			borderRadius: 10,
			barPercentage: 0.5,
			hoverBackgroundColor: "rgb(202,60,37)"
		}
	]
};

const config = {
	type: "bar",
	data: data,
	options: {
		responsive: true,
		plugins: {
			legend: {
				position: "top",
				display: false
			},
			title: {
				display: false,
				text: "Daily/Weekly/Yearly"
			}
		},
		scales: {
			x: {
				grid: {
					display: false
				}
			},
			y: {
				suggestedMin: 0,
				suggestedMax: 100,000
			}
		}
	}
};
const myChart = new Chart(document.getElementById("myChart"), config);

var chartOptions = document.querySelector("#chartOptions").value;

function showRange(display) {
	document.querySelector(".date-range").style.display = display;
}

function displayRange() {
	var from = document.querySelector(".start_date").value;
	var to = document.querySelector(".end_date").value;
	var error = document.querySelector(".error_message");
	error.innerHTML = "";
	if (from.length > 0 && to.length > 0) {
		var start_date = new Date(from);
		var end_date = new Date(to);
		if (end_date.getTime() > start_date.getTime()) {
			var start = start_date.toLocaleDateString("sv-SE");
			var end = end_date.toLocaleDateString("sv-SE");
			getChartData("range", start, end);
		} else {
			error.innerHTML = "Start Date must not be greater than end date";
		}
	} else {
		error.innerHTML = "Select the Start Date and End Date";
	}
}
function getChartData(chartOptions, from = null, to = null) {
	fetch(`/admin/chartData?chartType=${chartOptions}&from=${from}&to=${to}`)
		.then((resp) => resp.json())
		.then((resp) => {
			if (resp.status) {
				setChartData(chartOptions, resp.data, resp.labels);
			}
		});
}

function setChartData(label, data, inLabels = []) {
	var labels = inLabels.length > 0 ? inLabels : [];
	switch (label) {
		case "daily":
			labels = [
				"00:00:00",
				"01:00:00",
				"02:00:00",
				"03:00:00",
				"04:00:00",
				"05:00:00",
				"06:00:00",
				"07:00:00",
				"08:00:00",
				"09:00:00",
				"10:00:00",
				"11:00:00",
				"12:00:00",
				"13:00:00",
				"14:00:00",
				"15:00:00",
				"16:00:00",
				"17:00:00",
				"18:00:00",
				"19:00:00",
				"20:00:00",
				"21:00:00",
				"22:00:00",
				"23:00:00"
			];
			break;
		case "weekly":
			labels = [
				"Monday",
				"Tuesday",
				"Wednesday",
				"Thursday",
				"Friday",
				"Saturday",
				"Sunday"
			];
			break;
		case "monthly":
			labels = [
				"Jan",
				"Feb",
				"March",
				"Apr",
				"May",
				"Jun",
				"Jul",
				"Aug",
				"Sep",
				"Oct",
				"Nov",
				"Dec"
			];
			break;
	}

	myChart.data.labels = labels;
	var dataSets = myChart.data.datasets;
	dataSets[0].data = data["viewers"];
	dataSets[1].data = data["time_watched"];

	myChart.update();
}

function setChart(chartOptions) {
	if (chartOptions == "range") {
		showRange("flex");
	} else {
		showRange("none");
		getChartData(chartOptions);
	}
}

setChart(chartOptions);

// const labels = [
// 	"Monday",
// 	"Tuesday",
// 	"Wednesday",
// 	"Thursday",
// 	"Friday",
// 	"Saturday",
// 	"Sunday"
// ];
// const data = {
// 	labels: labels,
// 	datasets: [
// 		{
// 			label: "Daily",
// 			backgroundColor: "rgb(169,182,189)",
// 			borderColor: "rgb(169,182,189)",
// 			data: [0, 10, 5, 2, 20, 30, 45, 25],
// 			borderWidth: 1,
// 			borderRadius: 10,
// 			barPercentage: 0.5
// 		}
// 	]
// };
// </block:setup>
