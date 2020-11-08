fetch('https://developerhub.alfabank.by:8273/partner/1.0.0/public/nationalRates?currencyCode=840,978')
	.then(response => response.json())
	.then(commits => {
		/*let a = commits.rates[0].rate; console.log(a);
		document.querySelector(".currency-usd").innerHTML = a;
		console.log(commits.rates.length);*/
		for(let i=0; i<commits.rates.length; i++) {
			if(commits.rates[i].iso==='USD') {
				let a = commits.rates[i].iso;
				let b = commits.rates[i].rate;
				document.querySelector(".currency-usd").innerHTML = a;
				document.querySelector(".currency-usd-rate").innerHTML = b;
			}
			else if(commits.rates[i].iso==='EUR') {
				let a = commits.rates[i].iso;
				let b = commits.rates[i].rate;
				document.querySelector(".currency-eur").innerHTML = a;
				document.querySelector(".currency-eur-rate").innerHTML = b;
			}
		}
	  });