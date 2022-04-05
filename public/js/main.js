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

const labels = [
    'Monday',
    'Tuesday',
    'Wednesday',
    'Thursday',
    'Friday',
    'Saturday',
    'Sunday'
];
const data = {
    labels: labels,
    datasets: [
        {
        label: 'Daily',
        backgroundColor: 'rgb(255, 99, 132)',
        borderColor: 'rgb(255, 99, 132)',
        data: [0, 10, 5, 2, 20, 30, 45, 25],
    },
        {
        label: 'Weekly',
        backgroundColor: 'rgb(0, 0, 255)',
        borderColor: 'rgb(0, 0, 255)',
        data: [-10, 0, 15, 20, 5, 35, 40, 20],
    }
]
};
// </block:setup>

const config = {
    type: 'line',
    data: data,
    options: {
        responsive: true,
        plugins: {
            legend: {
                position: 'top',
            },
            title: {
                display: true,
                text: 'Daily/Weekly/Yearly'
            }
        }
    },
};
// </block:config>

// module.exports = {
//     actions: actions,
//     config: config,
// };

const myChart = new Chart(
    document.getElementById('myChart'),
    config

);