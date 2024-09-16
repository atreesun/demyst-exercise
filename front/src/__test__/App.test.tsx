import React from 'react';
import { render } from '@testing-library/react';
import '@testing-library/jest-dom';
import App from '../App';

describe("App component", () => {
  test('App renders', async () => {
    render(<App />);
  });
});
