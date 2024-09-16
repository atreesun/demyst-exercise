import React, { useEffect, useState } from 'react';
import './App.css';
import DataTable from 'react-data-table-component'; 
//import data from './Data.json';

interface Column {
  name: string;
  selector: (row: any) => string | number;
  sortable: boolean;
}

const App: React.FC = () => {
  const [columns, setColumns] = useState<Column[]>([]);
  const [tableData, setTableData] = useState<any[]>([]); //TODO Create type for tableData and fire error if json structure doesn't match
  const [loading, setLoading] = useState(true);

  useEffect(() => {
    const fetchData = async () => {
      try {
        const res = await fetch(process.env.REACT_APP_API_URI + '/BalanceSheet'); //TODO (?) Change to Axios for better backward compatibility
        const data = await res.json();

        const cols: Column[] = [
          {
            name: 'Account',
            selector: (row) => row.account,
            sortable: true,
          },
          {
            name: 'Current Value',
            selector: (row) => row.currentValue,
            sortable: true,
          },
          {
            name: 'Previous Value',
            selector: (row) => row.previousValue,
            sortable: true,
          },
        ];

        //Getting the table rows from json data:
        const rows = data.Reports[0].Rows.reduce((acc: any[], section: any) => {
          if (section.Rows) {
            const sectionRows = section.Rows
              .filter((row: any) => !row.Cells[0].Value.includes('Total')) //Total rows excluded
              .map((row: any) => ({
                account: row.Cells[0].Value,
                currentValue: row.Cells[1].Value,
                previousValue: row.Cells[2].Value,
              }));
            return acc.concat(sectionRows);
          }
          return acc;
        }, []);

        setColumns(cols);
        setTableData(rows);

      } catch (error) {
        console.error('Error fetching data:', error);
      } finally {
        setLoading(false);
      }
    };

    fetchData();
  }, []);

  return (
	<div className="App">
		{loading ? (
		<p>Loading...</p>
		) : (
		<DataTable
			columns={columns}
			data={tableData}
			pagination
		/>
		)}
    </div>
  );
};

export default App;
