import React, { useState } from 'react';
import Step1Applicant from './components/Step1Applicant';
import Step2Family from './components/Step2Family';
import Step3Business from './components/Step3Business';
import Step4Plan from './components/Step4Plan';
import Step5Finance from './components/Step5Finance';
import Step6Declaration from './components/Step6Declaration';
import api from './api';

const steps = [
  Step1Applicant,
  Step2Family,
  Step3Business,
  Step4Plan,
  Step5Finance,
  Step6Declaration
];

export default function App() {
  const [data, setData] = useState({});
  const [step, setStep] = useState(0);

  const CurrentStep = steps[step];

  const next = (values) => {
    setData(prev => ({ ...prev, ...values }));
    setStep(prev => prev + 1);
  };

  const prev = () => setStep(prev => prev - 1);

  const submit = async (values) => {
    const payload = { ...data, ...values };
    await api.submitApplication(payload);
    alert('Submitted successfully');
  };

  return (
    <div className="max-w-xl mx-auto p-4">
      <CurrentStep
        initialValues={data}
        onNext={step < steps.length - 1 ? next : submit}
        onBack={step > 0 ? prev : null}
      />
    </div>
  );
}