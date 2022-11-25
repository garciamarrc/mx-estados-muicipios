const selectEstado = document.getElementById("estado");
const selectMunicipio = document.getElementById("municipio");

const handleEstadoChange = async (e) => {
  selectMunicipio.innerHTML = "";
  const value = e.target.value;

  if (value === "") return;

  const data = await fetchData(value);
  insertOptions(data, selectMunicipio);
};

selectEstado.addEventListener("change", handleEstadoChange);

const fetchData = async (value) => {
  const res = await fetch("getMunicipiosByIdEstado.php", {
    method: "POST",
    body: JSON.stringify({
      id_estado: value,
    }),
    headers: {
      "content-type": "application/json",
    },
  });
  return await res.json();
};

const insertOptions = (data, HTMLElement) => {
  data.map(({ id, municipio }) => {
    HTMLElement.innerHTML += `<option value=${id}>${municipio}</option>`;
  });
};
