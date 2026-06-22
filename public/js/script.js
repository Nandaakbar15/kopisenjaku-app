// ===== SIDEBAR TOGGLE =====
let sidebarCollapsed = false;

function toggleSidebar() {
    const sidebar = document.getElementById("sidebar");
    const overlay = document.getElementById("sidebarOverlay");
    const main = document.getElementById("mainContent");

    if (window.innerWidth <= 1024) {
        sidebar.classList.toggle("open");
        overlay.classList.toggle("active");
    } else {
        sidebarCollapsed = !sidebarCollapsed;
        sidebar.classList.toggle("collapsed", sidebarCollapsed);
        main.classList.toggle("expanded", sidebarCollapsed);
    }
}

// Close sidebar on resize to desktop
window.addEventListener("resize", () => {
    if (window.innerWidth > 1024) {
        document.getElementById("sidebar").classList.remove("open");
        document.getElementById("sidebarOverlay").classList.remove("active");
    }
});

// ===== NAV ACTIVE STATE =====
function setActive(el) {
    document
        .querySelectorAll(".nav-item")
        .forEach((item) => item.classList.remove("active"));
    el.classList.add("active");
    if (window.innerWidth <= 1024) {
        toggleSidebar();
    }
}

// ===== TAB SWITCH =====
function switchTab(btn) {
    btn.parentElement
        .querySelectorAll(".tab-pill")
        .forEach((t) => t.classList.remove("active"));
    btn.classList.add("active");
}

// ===== COUNT UP ANIMATION =====
function animateCounters() {
    document.querySelectorAll(".count-up").forEach((el) => {
        const target = parseFloat(el.dataset.target);
        const decimal = parseInt(el.dataset.decimal) || 0;
        const isCurrency = el.textContent.includes("$");
        const isPercent = el.dataset.decimal === "1";
        const duration = 1800;
        const start = performance.now();

        function update(now) {
            const progress = Math.min((now - start) / duration, 1);
            const eased = 1 - Math.pow(1 - progress, 4);
            const current = target * eased;

            if (isCurrency) {
                el.textContent =
                    "$" +
                    current.toLocaleString("en-US", {
                        minimumFractionDigits: decimal,
                        maximumFractionDigits: decimal,
                    });
            } else if (isPercent) {
                el.textContent = current.toFixed(decimal) + "%";
            } else {
                el.textContent = Math.floor(current).toLocaleString("en-US");
            }

            if (progress < 1) {
                requestAnimationFrame(update);
            }
        }

        requestAnimationFrame(update);
    });
}

// ===== CALENDAR =====
function renderCalendar() {
    const grid = document.getElementById("calendarGrid");
    const daysInMonth = 31;
    const startDay = 3; // Wednesday
    const today = 15;
    const events = [3, 8, 12, 15, 22, 28];

    for (let i = 0; i < startDay; i++) {
        const empty = document.createElement("div");
        grid.appendChild(empty);
    }

    for (let day = 1; day <= daysInMonth; day++) {
        const div = document.createElement("div");
        div.className = "cal-day";
        div.textContent = day;

        if (day === today) div.classList.add("today");
        if (events.includes(day)) div.classList.add("has-event");

        grid.appendChild(div);
    }
}

// ===== CHARTS =====
function initCharts() {
    Chart.defaults.font.family = "'DM Sans', system-ui, sans-serif";
    Chart.defaults.color = "#9aa5b8";

    // Revenue Line Chart
    const revCtx = document.getElementById("revenueChart").getContext("2d");
    const revGradient = revCtx.createLinearGradient(0, 0, 0, 300);
    revGradient.addColorStop(0, "rgba(90, 92, 232, 0.12)");
    revGradient.addColorStop(1, "rgba(90, 92, 232, 0)");

    new Chart(revCtx, {
        type: "line",
        data: {
            labels: [
                "Jan",
                "Feb",
                "Mar",
                "Apr",
                "May",
                "Jun",
                "Jul",
                "Aug",
                "Sep",
                "Oct",
                "Nov",
                "Dec",
            ],
            datasets: [
                {
                    label: "Revenue",
                    data: [
                        8200, 9500, 11200, 10800, 13500, 14200, 15600, 14800,
                        17200, 18900, 20100, 22400,
                    ],
                    borderColor: "#5a5ce8",
                    backgroundColor: revGradient,
                    borderWidth: 2.5,
                    fill: true,
                    tension: 0.4,
                    pointRadius: 0,
                    pointHoverRadius: 6,
                    pointHoverBackgroundColor: "#5a5ce8",
                    pointHoverBorderColor: "#fff",
                    pointHoverBorderWidth: 3,
                },
                {
                    label: "Last Year",
                    data: [
                        6800, 7200, 8900, 9100, 10500, 11800, 12200, 11900,
                        13500, 14800, 16200, 17800,
                    ],
                    borderColor: "#dce0e8",
                    borderWidth: 2,
                    borderDash: [6, 4],
                    fill: false,
                    tension: 0.4,
                    pointRadius: 0,
                    pointHoverRadius: 0,
                },
            ],
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            interaction: {
                intersect: false,
                mode: "index",
            },
            plugins: {
                legend: {
                    display: false,
                },
                tooltip: {
                    backgroundColor: "#2d3344",
                    titleColor: "#fff",
                    bodyColor: "#c0c7d4",
                    borderColor: "rgba(255,255,255,0.06)",
                    borderWidth: 1,
                    cornerRadius: 12,
                    padding: 14,
                    titleFont: {
                        family: "Space Grotesk",
                        size: 13,
                        weight: "600",
                    },
                    bodyFont: {
                        size: 12,
                    },
                    displayColors: true,
                    boxPadding: 6,
                    usePointStyle: true,
                    callbacks: {
                        label: function (context) {
                            return (
                                context.dataset.label +
                                ": $" +
                                context.parsed.y.toLocaleString()
                            );
                        },
                    },
                },
            },
            scales: {
                x: {
                    grid: {
                        display: false,
                    },
                    ticks: {
                        font: {
                            size: 11,
                        },
                        color: "#9aa5b8",
                        padding: 10,
                    },
                    border: {
                        display: false,
                    },
                },
                y: {
                    grid: {
                        color: "#f0f1f4",
                        drawBorder: false,
                    },
                    ticks: {
                        font: {
                            size: 11,
                        },
                        color: "#9aa5b8",
                        padding: 10,
                        callback: function (value) {
                            return "$" + value / 1000 + "k";
                        },
                    },
                    border: {
                        display: false,
                    },
                },
            },
        },
    });

    // Traffic Doughnut Chart
    const trafficCtx = document.getElementById("trafficChart").getContext("2d");
    new Chart(trafficCtx, {
        type: "doughnut",
        data: {
            labels: ["Direct", "Organic", "Social", "Referral"],
            datasets: [
                {
                    data: [42, 28, 18, 12],
                    backgroundColor: [
                        "#5a5ce8",
                        "#2cd496",
                        "#fbbf24",
                        "#f6786e",
                    ],
                    borderWidth: 0,
                    hoverOffset: 6,
                },
            ],
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            cutout: "75%",
            plugins: {
                legend: {
                    display: false,
                },
                tooltip: {
                    backgroundColor: "#2d3344",
                    titleColor: "#fff",
                    bodyColor: "#c0c7d4",
                    borderColor: "rgba(255,255,255,0.06)",
                    borderWidth: 1,
                    cornerRadius: 12,
                    padding: 12,
                    callbacks: {
                        label: function (context) {
                            return context.label + ": " + context.parsed + "%";
                        },
                    },
                },
            },
        },
    });
}

// ===== SEARCH FILTER =====
const searchInput = document.getElementById("searchInput");
if (searchInput) {
    searchInput.addEventListener("input", function (e) {
        const term = e.target.value.toLowerCase();
        document.querySelectorAll(".data-table tbody tr").forEach((row) => {
            row.style.display = row.textContent.toLowerCase().includes(term)
                ? ""
                : "none";
        });
    });
}

// ===== INIT =====
document.addEventListener("DOMContentLoaded", () => {
    // Only render calendar if element exists
    const calendarGrid = document.getElementById("calendarGrid");
    if (calendarGrid) {
        renderCalendar();
    }

    // Only init charts if elements exist
    const revenueChart = document.getElementById("revenueChart");
    const trafficChart = document.getElementById("trafficChart");
    if (revenueChart || trafficChart) {
        initCharts();
    }

    setTimeout(animateCounters, 400);
});
