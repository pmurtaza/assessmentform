import React from 'react';
import { CheckCircle, XCircle, Circle } from 'lucide-react';

export default function Stepper({ steps, currentStep, status }) {
  return (
    <div className="d-flex justify-content-between mb-4">
      {steps.map((label, idx) => {
        const isComplete = status[idx] === 'complete';
        const isSkipped = status[idx] === 'skipped';
        const Icon = isComplete ? CheckCircle : isSkipped ? XCircle : Circle;
        const color = isComplete ? 'text-success' : isSkipped ? 'text-danger' : 'text-muted';
        const bgColor = isComplete ? 'bg-success' : isSkipped ? 'bg-danger' : 'bg-secondary';

        return (
          <div key={idx} className="text-center">
            <button onClick={() => currentStep(idx)} className="btn btn-link p-0">
              <div className={`d-flex justify-content-center align-items-center w-12 h-12 rounded-circle ${bgColor}`}>
                <Icon className={`mx-auto ${color}`} size={24} />
              </div>
              <div className="text-sm mt-1">{label}</div>
            </button>
          </div>
        );
      })}
    </div>
  );
}
