// Plugin Defaults
Chart.defaults.global.defaultFontFamily = "Montserrat";

Chart.plugins.register({
	afterDraw: function(chart) {
		if (chart.data.datasets[0].data.length === 0) {
			// No data is present
			var ctx = chart.chart.ctx;
			var width = chart.chart.width;
            var height = chart.chart.height;
            
			ctx.textAlign = 'center';
			ctx.textBaseline = 'middle';
			ctx.font = "12px bold 'Montserrat'";
			ctx.fillText('No data to display', width / 2, height / 2);
			ctx.restore();
		}
	}
});

// Charts
var firstChart = document.getElementById("first-chart").getContext("2d");
var secondChart = document.getElementById("second-chart").getContext("2d");
var thirdChart = document.getElementById("third-chart").getContext("2d");
var fourthChart = document.getElementById("fourth-chart").getContext("2d");

// Background Colors
var colors = ["#1d66af", "#0a8bdb", "#0daaf2", "#4dc9ff",
              "#1d66af", "#0a8bdb", "#0daaf2", "#4dc9ff",
              "#1d66af", "#0a8bdb", "#0daaf2", "#4dc9ff"]

// Labels
var users = ["Patients", "Medics", "Investigators", "Admins"]

// Second Data Auxiliary Variables
var result = []
var countRes = []

secondData.forEach(element => {
    if(element["result"] != null) {
        result.push(element["result"]);
        countRes.push(element["countRes"]);
    }
});

// Third Data Auxiliary Variables
var lastYear = null;
var lastMonth = null;
var countPerMonth = []
var months = []
var monthNames = [
    "Jan", "Feb", "Mar",
    "Apr", "May", "Jun",
    "Jul", "Aug", "Sep",
    "Oct", "Nov", "Dec"
]

thirdData.forEach(element => {
    if(lastYear == null && lastMonth == null) {
        lastYear = element["year"];
        lastMonth = parseInt(element["month"]);
        countPerMonth.push(element["cnt"]);
        months.push([monthNames[parseInt(element["month"])-1], element["year"]])
    } else if(element["year"] == lastYear && parseInt(element["month"]) == lastMonth+1) {
        countPerMonth.push(element["cnt"]);
        months.push(monthNames[parseInt(element["month"])-1]);
        lastMonth = parseInt(element["month"]);
    } else {
        if (parseInt(element["month"]) != lastMonth+1 && parseInt(element["month"]) != 1) {
            countPerMonth.push(0);
            months.push(monthNames[lastMonth]);
            countPerMonth.push(element["cnt"]);
            months.push(monthNames[parseInt(element["month"])-1]);
            lastMonth += 2;
        } else {
            lastYear = element["year"];
            countPerMonth.push(element["cnt"]);
            months.push([monthNames[parseInt(element["month"])-1], element["year"]]);
            lastMonth = parseInt(element["month"]);
        }
    }

    if(months.length > 12 && countPerMonth.length > 12) {
        months.shift();
        countPerMonth.shift();
    }
});

//Fourth Data Auxiliary Variables
var symptomsAndRisks = []
var numSymptomAndRisk = []

for(var i = 0;  i < 6; i++) {
    symptomsAndRisks.push(fourthData[i]["name"]);
    numSymptomAndRisk.push(fourthData[i]["cnt"]);
}

// Chart Editing
makeChart(firstChart, "bar", users, [firstData["patients"], firstData["medics"], firstData["investigators"], firstData["admins"]], "Num. Platform Users");
makeChart(secondChart, "pie", result, countRes, "Support System Results");
makeChart(thirdChart, "line", months, countPerMonth, "Num. Appointments per Month");
makeChart(fourthChart, "horizontalBar", symptomsAndRisks, numSymptomAndRisk, "Most Common Symptoms and Risks");

function makeChart(canvas, type, labels, data, title) {
    return new Chart(canvas, {
        type: type,
        data: {
            labels: labels,
            datasets: (data === []) ? [] : [{
                fill: (type === "line") ? false : true,
                data: data,
                backgroundColor: colors
            }]
        },
        options: {
            title: {
                fontSize: 16,
                fontStyle: "bold",
                fontColor: "#1f61ac",
                display: true,
                text: title
            },
            legend: {
                display: (type !== "pie") ? false : true,
                labels: {
                    fontColor: "#3d3d3d",
                    fontStyle: "bold"
                },
            },
            scales: {
                yAxes: (type === "pie") ? [] : [{
                    ticks: {
                        beginAtZero: true,
                        precision: 0
                    }
                }],
                xAxes: (type !== "horizontalBar") ? [] : [{
                    ticks: {
                        beginAtZero: true,
                        precision: 0
                    }
                }] 
            }
        }
    });
}