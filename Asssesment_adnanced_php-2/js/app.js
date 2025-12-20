let ctx = document.getElementById("surveyChart").getContext("2d");
let chart;

function loadResults() {
    fetch("results.php")
        .then(res => res.json())
        .then(data => {

            let labels = Object.keys(data);
            let values = Object.values(data);

            if (chart) chart.destroy();

            chart = new Chart(ctx, {
                type: "bar",
                data: {
                    labels: labels,
                    datasets: [{
                        label: "Live Survey Results",
                        data: values,
                        backgroundColor: "#4CAF50"
                    }]
                },
                options: {
                    scales: {
                        y: {
                            beginAtZero: true,
                            ticks: { stepSize: 1 }
                        }
                    }
                }
            });
        });
}
setInterval(loadResults, 3000);
loadResults();