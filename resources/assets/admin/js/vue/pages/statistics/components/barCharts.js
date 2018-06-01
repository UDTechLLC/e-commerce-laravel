import {Bar, mixins} from 'vue-chartjs'
const {reactiveProp} = mixins

export default {
  extends: Bar,
  mixins: [reactiveProp],
  props: ['options'],
  data: () => ({
    gradient: null
  }),
  mounted () {
    console.log(this.chartData);
    this.gradient = this.$refs.canvas.getContext('2d').createLinearGradient(0, 0, 0, 450);

    this.gradient.addColorStop(0, 'rgba(255, 0, 0, 1)');
    this.gradient.addColorStop(0.5, 'rgba(255, 0, 0, 0.5)');
    this.gradient.addColorStop(1, 'rgba(255, 0, 0, 0)');

    this.renderChart({
      labels: this.chartData.labels,
      datasets: [
        {
          label: 'Purchases for the selected items',
          borderColor: 'rgba(255, 0, 0, 1)',
          pointBackgroundColor: 'white',
          borderWidth: 1,
          pointBorderColor: '#000000',
          backgroundColor: this.gradient,
          hoverBackgroundColor: 'rgba(255, 0, 0, 1)',
          data: this.chartData.datasets[0].data
        }
      ]
    }, {
      tooltips: {
        backgroundColor: '#4F5565',
        titleFontStyle: 'normal',
        titleFontSize: 18,
        bodyFontFamily: "'Proxima Nova', sans-serif",
        cornerRadius: 3,
        bodyFontColor: '#20C4C8',
        bodyFontSize: 14,
        displayColors: false,
        intersect: false
      },
      responsive: true,
      maintainAspectRatio: false
    })
  }
}